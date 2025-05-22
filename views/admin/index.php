<?php
use yii\helpers\Html;


/** @var yii\web\View $this */
$this->title = 'Admin Page';
?>

<div class="admin-panel p-5 my-5">
     <?= Html::a('Факультеты', ['admin/faculty-admin-panel'], ['class' => 'fas fa-university']) ?>
    <a href="#"><i class="fas fa-building"></i> Кафедры</a>
    <a href="#"><i class="fas fa-building"></i> Сотрудники</a>

    <a href="#"><i class="fas fa-newspaper"></i> Новости</a>
    <a href="#"><i class="fas fa-file-pdf"></i> ПДФ</a>
    <a href="#"><i class="fas fa-info-circle"></i> Информационные страницы</a>
</div>
