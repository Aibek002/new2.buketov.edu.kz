<?php
use yii\helpers\Html;
use app\assets\AdminHomeAsset;

AdminHomeAsset::register($this);
/** @var yii\web\View $this */
$this->title = 'Admin Page';

?>
<div class="admin-panel container my-5">

    <?php if (Yii::$app->user->can("adminAdmin")): ?>

        <h2 class="mb-5 text-center fw-bold">Админ Панель</h2>
        <div class="row g-4">
            <div>
                <a style="position: absolute; top: 150px; right: 75px; z-index: 1000; "
                    href="/yii2/web/index.php?r=admin-edit%2F" class="admin-card d-block text-center p-3">
                    <i class="fas fa-user-plus fa-2x mb-2 text-primary"></i>
                    <p class="fw-semibold mb-0">Edit</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fsign-up" class="admin-card d-block text-center p-4">
                    <i class="fas fa-user-plus fa-3x mb-3 text-primary"></i>
                    <p class="fw-semibold">Создать пользователя</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fhistory-departament-admin-panel"
                    class="admin-card d-block text-center p-4">
                    <i class="fas fa-landmark fa-3x mb-3 text-success"></i>
                    <p class="fw-semibold">История кафедры</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fhistory-faculty-admin-panel"
                    class="admin-card d-block text-center p-4">
                    <i class="fas fa-school fa-3x mb-3 text-info"></i>
                    <p class="fw-semibold">История факультетов</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Farticle-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-file-alt fa-3x mb-3 text-warning"></i>
                    <p class="fw-semibold">Информационные страницы</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fdepartament-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-university fa-3x mb-3 text-danger"></i>
                    <p class="fw-semibold">Кафедры</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fprofession-college" class="admin-card d-block text-center p-4">
                    <i class="fas fa-graduation-cap fa-3x mb-3 text-primary"></i>
                    <p class="fw-semibold">Профессии колледжа</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fstaff-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-users fa-3x mb-3 text-secondary"></i>
                    <p class="fw-semibold">Сотрудники</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Ffaculty-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-info"></i>
                    <p class="fw-semibold">Факультеты</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fupload-image" class="admin-card d-block text-center p-4">
                    <i class="fas fa-image fa-3x mb-3 text-success"></i>
                    <p class="fw-semibold">Загрузить фото</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fdoctorant-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-user-graduate fa-3x mb-3 text-warning"></i>
                    <p class="fw-semibold">Докторанты</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fnews-admin-panel" class="admin-card d-block text-center p-4">
                    <i class="fas fa-newspaper fa-3x mb-3 text-danger"></i>
                    <p class="fw-semibold">Новости</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fadd-events" class="admin-card d-block text-center p-4">
                    <i class="fas fa-newspaper fa-3x mb-3 text-danger"></i>
                    <p class="fw-semibold">События</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fadd-smi-about-us" class="admin-card d-block text-center p-4">
                    <i class="fas fa-book fa-3x mb-3 text-success"></i>
                    <p class="fw-semibold">СМИ о нас</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fadmission-pdf-admin-panel"
                    class="admin-card d-block text-center p-4">
                    <i class="fas fa-file-pdf fa-3x mb-3 text-primary"></i>
                    <p class="fw-semibold">ПДФ для приёмной комиссии</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fcorporate-governance-file"
                    class="admin-card d-block text-center p-4">
                    <i class="fas fa-folder fa-3x mb-3 text-secondary"></i>
                    <p class="fw-semibold">Файлы корпоративного управления</p>
                </a>
            </div>

            <div class="col-md-3 col-sm-6">
                <a href="/yii2/web/index.php?r=admin%2Fdissertation-advice" class="admin-card d-block text-center p-4">
                    <i class="fas fa-book fa-3x mb-3 text-success"></i>
                    <p class="fw-semibold">Контроль диссертаций</p>
                </a>
            </div>

        </div>




    <?php elseif (Yii::$app->user->can("admissionAdmin")): ?>
        <?= Html::a('ПДФ для приемный коммиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>
        <?= Html::a('Контроль над Документами', ['admin/'], ['class' => 'fas fa-university']) ?>

    <?php elseif (Yii::$app->user->can("admissionEditor")): ?>
        <?= Html::a('ПДФ для приемный коммиссий', ['admin/admission-pdf-admin-panel'], ['class' => 'fas fa-university']) ?>
    <?php endif ?>

</div>