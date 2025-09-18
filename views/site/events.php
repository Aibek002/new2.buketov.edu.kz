<?php
use app\assets\EventsAsset;
EventsAsset::register($this);
?>
<div class="container my-5 p-5">
    <div class="row">
        <!-- Левая колонка: месяцы -->
        <div class="col-md-3">
            <div class="month-list list-group shadow-sm">

            </div>
        </div>

        <!-- Правая колонка: события -->
        <div class="col-md-9 g-2 events">

        </div>


    </div>
</div>
</div>
<script>
    const date = new Date();
    const year = new Date().getFullYear();
    const currentMonthIndex = date.getMonth();
    const option = { month: 'long' };
    const month = date.toLocaleString('ru-Ru', option);
    console.log(month);
    const container_mon_list = document.querySelector('.month-list');
    const events_container = document.querySelector('.events');
    const months = [
        "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
        "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"
    ];
    months.forEach((element, index) => {
        // если месяц совпадает с текущим, добавляем "active"
        const activeClass = index === currentMonthIndex ? "active" : "";
        container_mon_list.innerHTML += `
        <button class="list-group-item list-group-item-action ${activeClass}" onclick="openMonthEvents('${index + 1}' ,'${year}' , '<?= Yii::$app->language ?>')">${element}</button>
        `;

    });
    openMonthEvents(currentMonthIndex + 1, year, "<?= Yii::$app->language ?>");
    function openMonthEvents(month, year, lang) {
        let language_month = "";
        let title_text = "";

        const monthText = new Date(2025, month - 1, 1)
            .toLocaleString(
                lang === 'kz' ? 'kk-KZ' : (lang === 'ru' ? 'ru-RU' : 'en-US'),
                { month: 'long' }
            );

        const monthFormatted = monthText.charAt(0).toUpperCase() + monthText.slice(1);

        if (lang === 'ru') {
            language_month = "ru-RU";
            title_text = "<?= Yii::t('app', 'Events for'); ?> " + monthFormatted;
        } else if (lang === 'kz') {
            language_month = "kk-KZ";
            title_text = monthFormatted + " <?= Yii::t('app', 'Events for'); ?>";
        } else {
            language_month = "en-US";
            title_text = "<?= Yii::t('app', 'Events for'); ?> " + monthFormatted;
        }

        events_container.innerHTML = `<h3 class="fw-bold mb-4 title">${title_text}</h3>`;
        fetch(`/yii2/web/index.php?r=ajax/events-for-month&month=${month}&year=${year}`)
            .then(request => request.json())
            .then(data => {
                console.log(data);
                console.log(data.length);
                if (data && data.length > 0) {
                    data.forEach(element => {

                        const date = new Date(element.time_events);
                        const day = date.getDate();
                        const month = date.getMonth() + 1;
                        const monthText = date.toLocaleString(language_month, { month: 'long' });
                        const title = "title_" + lang;
                        const content = "content_" + lang;
                        events_container.innerHTML += `
                        <div class="card shadow-sm border-0 rounded-3 my-1">
                            <div class="card-body">
                                <div class="row align-items-center"> 
                                    <div class="col-md-3 text-center border-end">
                                        <div class="date-box p-3">
                                            <h2 class="mb-0 title fw-bold">${day}</h2>
                                            <p class="mb-0 text-muted"> ${monthText}</p>
                                        </div>
                                    </div> 
                                    <div class="col-md-9 ps-4">
                                        <h5 class="fw-bold mb-2 text-secondary">${element[title]}</h5>
                                        <p class="text-muted mb-0"> ${element[content]} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    });
                } else {
                    events_container.innerHTML += `<h3 class="alert alert-danger">В этом месяце отсутствуют события!</h3>`;
                }

            });
    }
</script>