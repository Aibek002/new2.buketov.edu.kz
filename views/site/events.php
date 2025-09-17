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
            <h3 class="fw-bold mb-4 title">События за Сентябрь</h3>

            <!-- Событие -->
            <div class="card shadow-sm border-0 rounded-3 my-1">
                <div class="card-body">
                    <div class="row align-items-center"> <!-- Левая часть с датой -->
                        <div class="col-md-3 text-center border-end">
                            <div class="date-box p-3">
                                <h2 class="mb-0 title fw-bold">10</h2>
                                <p class="mb-0 text-muted">Сентябрь</p>
                            </div>
                        </div> <!-- Правая часть с событием -->
                        <div class="col-md-9 ps-4">
                            <h5 class="fw-bold mb-2 text-secondary">Заголовок события</h5>
                            <p class="text-muted mb-0"> Здесь будет описание события. Можно написать несколько строк
                                текста, чтобы дать пользователю представление о содержании. </p>
                        </div>
                    </div>
                </div>
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
        <button class="list-group-item list-group-item-action ${activeClass}" onclick="openMonthEvents('${index + 1}' ,'${year}')">${element}</button>
        `;

    });
    function openMonthEvents(month, year) {
        fetch(`/yii2/web/index.php?r=ajax/events-for-month&month=${month}&year=${year}`)
            .then(request => request.json())
            .then(data => {
                console.log(data);
                data.forEach(element => {
                    events_container.innerHTML +=`
            <h3 class="fw-bold mb-4 title">События за Сентябрь</h3>

            <!-- Событие -->
            <div class="card shadow-sm border-0 rounded-3 my-1">
                <div class="card-body">
                    <div class="row align-items-center"> <!-- Левая часть с датой -->
                        <div class="col-md-3 text-center border-end">
                            <div class="date-box p-3">
                                <h2 class="mb-0 title fw-bold">10</h2>
                                <p class="mb-0 text-muted">Сентябрь</p>
                            </div>
                        </div> <!-- Правая часть с событием -->
                        <div class="col-md-9 ps-4">
                            <h5 class="fw-bold mb-2 text-secondary">Заголовок события</h5>
                            <p class="text-muted mb-0"> Здесь будет описание события. Можно написать несколько строк
                                текста, чтобы дать пользователю представление о содержании. </p>
                        </div>
                    </div>
                </div>
            </div>


          
                    `
                });
                
            });
    }
</script>