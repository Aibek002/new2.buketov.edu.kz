<?php
use yii\helpers\Html;


/** @var yii\web\View $this */
$this->title = 'Admin Page';
?>

<div class="admin-panel p-5 my-5">
    <?php if (Yii::$app->user->can("adminAdmin")): ?>
        <?= Html::a('Создать пользователя', ['admin/sign-up'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('История кафедры', ['admin/history-departament-admin-panel'], ['class' => 'fas st-university']) ?>
        <?= Html::a('История факультетов', ['admin/history-faculty-admin-panel'], ['class' => 'fas st-university']) ?>
        <?= Html::a('Информационные страницы', ['admin/article-admin-panel'], ['class' => 'fas ar-university']) ?>
        <?= Html::a('Кафедры', ['admin/departament-admin-panel'], ['class' => 'fas dp-university']) ?>
        <?= Html::a('Профессий колледжа', ['admin/profession-college'], ['class' => 'fas st-university']) ?>
        <?= Html::a('Сотрудники', ['admin/staff-admin-panel'], ['class' => 'fas st-university']) ?>
        <?= Html::a('Факультеты', ['admin/faculty-admin-panel'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('Загрузить фоты на инфармациионные страницы', ['admin/upload-image'], ['class' => 'fas fa-university']) ?>

        <?= Html::a('Новости', ['admin/news-admin-panel'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('ПДФ для приемный комиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('Решение Единственного Акционера', ['admin/corporate-sole-shareholder'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('Управление файлами Корпоративного управление', ['admin/corporate-governance-file'], ['class' => 'fas fa-university']) ?>

    <?php elseif (Yii::$app->user->can("admissionAdmin")): ?>
        <?= Html::a('ПДФ для приемный коммиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('Контроль над Документами', ['admin/'], ['class' => 'fas fa-university']) ?>

    <?php elseif (Yii::$app->user->can("admissionEditor")): ?>
        <?= Html::a('ПДФ для приемный коммиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>
    <?php endif ?>

</div>