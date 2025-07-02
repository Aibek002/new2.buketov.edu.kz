
<?php
use yii\helpers\Html;


/** @var yii\web\View $this */
$this->title = 'Admin Page';
?>

<div class="admin-panel p-5 my-5">
    <?= Html::a('История кафедры', ['admin/history-departament-admin-panel'], ['class' => 'fas st-university']) ?>
    <?= Html::a('История факультетов', ['admin/history-faculty-admin-panel'], ['class' => 'fas st-university']) ?>
    <?= Html::a('Информационные страницы', ['admin/article-admin-panel'], ['class' => 'fas ar-university']) ?>
    <?= Html::a('Кафедры', ['admin/departament-admin-panel'], ['class' => 'fas dp-university']) ?>
    <?= Html::a('Профессий колледжа', ['admin/profession-college'], ['class' => 'fas st-university']) ?>
    <?= Html::a('Сотрудники', ['admin/staff-admin-panel'], ['class' => 'fas st-university']) ?>
    <?= Html::a('Факультеты', ['admin/faculty-admin-panel'], ['class' => 'fas fa-university']) ?>
    <?= Html::a('Новости', ['admin/news-admin-panel'], ['class' => 'fas fa-university']) ?>
    <?= Html::a('ПДФ для приемный коммиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>


</div>
<?php phpinfo(); ?>
