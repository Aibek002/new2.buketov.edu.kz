<?php
use yii\helpers\Html;
\app\assets\AdminAsset::register($this);

/* @var $this yii\web\View */

$this->title = 'Админ панель';
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Админ панель — редактирование</h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <?= Html::a('Редактировать статьи', ['admin-edit/edit-article'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать кафедры', ['admin-edit/edit-departament'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать факультеты', ['admin-edit/edit-faculty'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать историю кафедры', ['admin-edit/edit-history-departament'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать историю факультета', ['admin-edit/edit-history-faculty'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать новости', ['admin-edit/edit-news'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать профессии колледжа', ['admin-edit/edit-profession-college'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать сотрудников', ['admin-edit/edit-staff'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать файлы приемный камиссий', ['admin-edit/edit-admission-file'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать файлы Диссертационного совета', ['admin-edit/edit-dissertation-file'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактировать Докторантов', ['admin-edit/edit-doctorant'], ['class' => 'text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                    <?= Html::a('Редактирование файла корпоративного управления', ['admin-edit/edit-corporate-file'], ['class' => 'text-decoration-none']) ?>
                </li>
            </ul>
        </div>
    </div>
</div>