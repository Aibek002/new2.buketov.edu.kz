<?php
use app\assets\EventsAsset;
EventsAsset::register($this);
?>
<div class="container my-5 p-5">
    <div class="row">
        <!-- Левая колонка: месяцы -->
        <div class="col-md-3">
            <div class="list-group shadow-sm">
                <a href="#" class="list-group-item list-group-item-action active">Январь</a>
                <a href="#" class="list-group-item list-group-item-action">Февраль</a>
                <a href="#" class="list-group-item list-group-item-action">Март</a>
                <a href="#" class="list-group-item list-group-item-action">Апрель</a>
                <a href="#" class="list-group-item list-group-item-action">Май</a>
                <a href="#" class="list-group-item list-group-item-action">Июнь</a>
                <a href="#" class="list-group-item list-group-item-action">Июль</a>
                <a href="#" class="list-group-item list-group-item-action">Август</a>
                <a href="#" class="list-group-item list-group-item-action">Сентябрь</a>
                <a href="#" class="list-group-item list-group-item-action">Октябрь</a>
                <a href="#" class="list-group-item list-group-item-action">Ноябрь</a>
                <a href="#" class="list-group-item list-group-item-action">Декабрь</a>
            </div>
        </div>

        <!-- Правая колонка: события -->
        <div class="col-md-9 g-2">
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