<?php

/** @var yii\web\View $this */

$this->title = 'Buketov University Faculties';
?>
<div class="main-wrapper d-flex flex-column justify-content-center align-items-center">
    <div class="container py-5 faculty-info text-center">
        
        <!-- Заголовок -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <h2 class="faculty-title">БИОЛОГО-ГЕОГРАФИЧЕСКИЙ ФАКУЛЬТЕТ</h2>
            </div>
        </div>

        <!-- Контент блока факультета -->
        <div class="row justify-content-center align-items-start">
            
            <!-- Левая колонка: информация о декане -->
            <div class="col-md-3 d-flex flex-column align-items-start gap-2 faculty-contact">
                <div class="dean-photo">
                    <img src="/bg-images/faculties-img/faculties-bgf/decan.png" alt="Фото декана" class="img-fluid">
                </div>
                <div class="dean-name fw-bold">Имя Фамилия</div>
                <div class="dean-position"> Декан Биолого-географического факультета </div>
                <div class="dean-phone">Телефон : +7(777)-777-77-77</div>
                <div class="dean-email">Email: dean_bgf@buketov.edu.kz</div>
                <div class="faculty-address">Адрес : ул. Университетская 28/3, корпус № 3 </div>
                <p class="faculty-communication-block-header">Мы в социальных сетях:</p>
                <div class="faculty-social">
                    
                    <img src="/bg-images/svg/iconFacebook.svg" alt="Facebook Icon">
                    <img src="/bg-images/svg/iconWhatsapp.svg" alt="WhatsApp Icon">
                    <img src="/bg-images/svg/iconTelegram.svg" alt="Telegram Icon">
                </div>
                <p class="faculty-communication-block-header">Cвяжитесь с нами:</p>
                <div class="faculty-contact-info">
                    
                    <img src="/bg-images/svg/iconPhone.svg" alt="Telegram Icon">
                    <img src="/bg-images/svg/iconEmail.svg" alt="Telegram Icon">
                </div>
            </div>

            <!-- Правая колонка: контент о факультете -->
            <div class="col-md-7 faculty-description">
                <div class="buttons d-flex justify-content-between">
                    <button class="information-faculties-btn">Информация о факультете</button>
                    <button class="date-and-facts-faculties-btn">Даты и Факты</button>
                    <button class="departament-faculties-btn">Кафедры</button>
                </div>
                <div class="content-faculties d-flex flex-column">
                    <div class="move-content-faculties d-flex">
                        <div class="information-faculties">
                            <p>Биолого-географический факультет - один из старейших в Карагандинском университете им. академика Е.А. Букетова, был организован в 1972 году на базе факультета естествознания Педагогического института, история которого начинается в 1952 году.</p>
                        </div>
                        <div class="date-and-facts-faculties">
                            <p>В 1955 году факультет естествознания отделился от физико-математического факультета, став самостоятельным факультетом. Первым деканом факультета естествознания была к.х.н. Р.Г. Омарова. Она заложила основу факультета естествознания, поставив на высокий уровень чтение лекций, проведение практических занятий, внесла большой вклад в подготовку высококвалифицированных специалистов-биологов и химиков в Казахстане. В декабре 1955 года заведующей кафедрой естествознания назначается к.м.н., доцент П.С.Кравицкая.
                                В 1956 году были открыты кафедры ботаники, зоологии, химии.
                                В 1964 году на кафедре «Сельскохозяйственное производство» была открыта агрохимическая лаборатория, в которой проходили переподготовку агрономы Карагандинской области.
                                В 1966 году кафедра зоологии разделилась на две кафедры: «Зоологию» и «Физиологию человека и животных». </p>
                        </div>
                        <div class="departments-faculties">
                            <p>Кафедра ботаники</p>

                            <p>Кафедра зоологии</p>

                            <p>Кафедра физиологии</p>

                            <p>Кафедра географии</p>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
