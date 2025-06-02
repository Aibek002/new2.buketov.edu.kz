<?php
use yii\helpers\Html;


/** @var yii\web\View $this */
$this->title = 'Admin Page';
?>

<div class="admin-panel p-5 my-5">
    <?= Html::a('Факультеты', ['admin/faculty-admin-panel'], ['class' => 'fas fa-university']) ?>

    <?= Html::a('Кафедры', ['admin/departament-admin-panel'], ['class' => 'fas dp-university']) ?>

    <?= Html::a('Сотрудники', ['admin/staff-admin-panel'], ['class' => 'fas st-university']) ?>

    <a href="#"><i class="fas fa-newspaper"></i> Новости</a>
    <a href="#"><i class="fas fa-file-pdf"></i> ПДФ</a>
    <?= Html::a('Информационные страницы', ['admin/article-admin-panel'], ['class' => 'fas ar-university']) ?>

</div>