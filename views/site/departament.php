<?php
use app\components\LanguageHelper;
use yii\helpers\Html;
use app\assets\DepartamentAsset;

DepartamentAsset::register($this);

?>

<div class="departament-hero">
    <div class="faculty-overlay">
        <h1>
            <br>
            <?= !empty($departament) && !empty($departament->{LanguageHelper::name()}) ? htmlspecialchars($departament->{LanguageHelper::name()}) : '( Здесь ничего не задано )' ?>
        </h1>
    </div>
</div>

<div class="first-flex-faculty p-5 m-3">
    <div class="departament-container">

        <div class="faculty-text col-md-6">
            <?php if (!empty($departament)): ?>
                <h2><?= !empty($departament->{LanguageHelper::welcome()}) ? $departament->{LanguageHelper::welcome()} : '( Здесь ничего не задано )' ?>
                </h2>

                <p><?= !empty($departament->{LanguageHelper::information()}) ? $departament->{LanguageHelper::information()} : '( Здесь ничего не задано )' ?>
                </p>

            <?php else: ?>
                <h2>( Здесь ничего не задано )</h2>
                <p>( Здесь ничего не задано )</p>
            <?php endif; ?>

        </div>

        <div class="dean d-flex justify-content-center align-items-center col-md-4">
            <div style="overflow:hidden;width:300px;height:300px;
                        border: 10px solid white;
                        border-radius: 100%;">
                <img style="position: relative;"
                    src="<?= !empty($dean['image']) ? nl2br(htmlspecialchars($dean['image'])) : 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>"
                <img style="position: relative;"
                    src="<?= !empty($dean['image']) ? nl2br(htmlspecialchars($dean['image'])) : 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>"
                    alt="Декан факультета" />
            </div>

            <div class="information-dean">
                <p class="full-name-dean">
                    <?= !empty($dean['name'])
                        ? nl2br(htmlspecialchars(
                            $dean['surname'] . " " .
                            $dean['name'] . " " .
                            $dean['patronymic']
                        ))
                        : '( Здесь ничего не задано )' ?>
                </p>
                <p class="job-title-dean">
                    <?= !empty($dean['job_title'])
                        ? nl2br(htmlspecialchars($dean['job_title']))
                        : '( Здесь ничего не задано )' ?>
                </p>

                <div class="d-flex justify-content-center gap-3 my-2">
                    <a
                        href="mail:to:<?= !empty($dean['email']) ? $dean['email'] : Yii::t('app', 'not specified') ?>">
                    <div class="email_head_departament">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.3332 7.99998C29.3332 6.53331 28.1332 5.33331 26.6665 5.33331H5.33317C3.8665 5.33331 2.6665 6.53331 2.6665 7.99998V24C2.6665 25.4666 3.8665 26.6666 5.33317 26.6666H26.6665C28.1332 26.6666 29.3332 25.4666 29.3332 24V7.99998ZM26.6665 7.99998L15.9998 14.6667L5.33317 7.99998H24V10L14L4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7H4V7"
                                fill="white"></path>
                        </svg>
                    </div></a>
                    <?= Html::a(Yii::t('app', 'Для просмотра истории кафедры перейдите по ссылке'), ['site/history-departament', 'departament_id' => $departament_id], ['class' => 'history-departament']) ?>
                </div>

            </div>
        </div>

    </div>
    
    <div class="teacher-title"><?= Yii::t('app', 'Teachers') ?>
        <div class="teachers-container">
            <?php foreach ($teachers as $teacher): ?>
                <div onclick="openTeachersBox(this)"
                    data-fio="<?= Html::encode($teacher['surname'] . ' ' . $teacher['name'] . ' ' . $teacher['patronymic']) ?>"
                    data-jobtitle="<?= Html::encode($teacher['job_title']) ?>"
                    data-info="<?= Html::encode($teacher['information']) ?>"
                    data-email="<?= Html::encode($teacher['email']) ?>" class="teachers-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png" alt="Фото преподавателя">
                <?php
                $fio = trim($teacher['surname'] . ' ' . $teacher['name'] . ' ' . $teacher['patronymic']);
                $image = empty($teacher['image'])
                    ? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png'
                    : $teacher['image'];
                ?>

                <div class="teachers-box" onclick="openTeachersBox(this)" data-fio="<?= Html::encode($fio) ?>"
                    data-jobtitle="<?= Html::encode($teacher['job_title']) ?>"
                    data-info="<?= Html::encode($teacher['information']) ?>"
                    data-email="<?= Html::encode($teacher['email']) ?>">

                    <div class="teacher-image" style="--teacher_avatar:url('<?= Html::encode($image) ?>');">
                    </div>

                    <div class="content-teacher">
                        <p class="fio"><?= Html::encode($fio) ?></p>
                        <p class="job_title"><?= Html::encode($teacher['job_title']) ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="blur"></div>
    <div class="more-teachers-overlay"></div>

    <!-- <?= !empty($departament->name_ru) ? nl2br(htmlspecialchars($departament->{LanguageHelper::name()})) : '( Здесь ничего не задано )' ?> -->

</div>