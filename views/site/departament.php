<?php
use app\components\LanguageHelper;
use yii\helpers\Html;

?>

<div class="faculty-hero">
    <div class="faculty-overlay">
        <h1>
            <br>
            <?= !empty($departament) && !empty($departament->{LanguageHelper::name()}) ? htmlspecialchars($departament->{LanguageHelper::name()}) : '( Здесь ничего не задано )' ?>
        </h1>
    </div>
</div>

<div class="first-flex-faculty p-5 my-5">
    <div class="faculty-container">

        <div class="faculty-text">
            <?php if (!empty($departament)): ?>
                <h2><?= !empty($departament->{LanguageHelper::welcome()}) ? nl2br(htmlspecialchars($departament->{LanguageHelper::welcome()})) : '( Здесь ничего не задано )' ?>
                </h2>
                <p><?= !empty($departament->{LanguageHelper::information()}) ? nl2br(htmlspecialchars($departament->{LanguageHelper::information()})) : '( Здесь ничего не задано )' ?>
                </p>
            <?php else: ?>
                <h2>( Здесь ничего не задано )</h2>
                <p>( Здесь ничего не задано )</p>
            <?php endif; ?>
            <b><?= !empty($dean->{LanguageHelper::name()}) ? nl2br(htmlspecialchars($dean->{LanguageHelper::surname()} . " " . $dean->{LanguageHelper::name()} . " " . $dean->{LanguageHelper::patronymic()})) : '( Здесь ничего не задано )' ?>
            </b> -

            <?= !empty($dean->{LanguageHelper::job_title()}) ? nl2br(htmlspecialchars($dean->{LanguageHelper::job_title()})) : '( Здесь ничего не задано )' ?>

            </p>
            <p>Email: <a href="">
                    <?= !empty($dean->email) ? nl2br(htmlspecialchars($dean->email)) : '( Здесь ничего не задано )' ?>,
                </a></p>
            <p><?= Html::a(Yii::t('app', 'Для просмотра истории кафедры перейдите по ссылке'), ['site/history-departament', 'departament_id' => $departament_id ]) ?></p>
        </div>

        <div class="faculty-image">
            <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png" alt="Декан факультета" />
        </div>

    </div>
 <div class="teachers-container">
    <?php foreach($teachers as $teacher):?>
        <div class="teachers-box">
            <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png" alt="Фото преподавателя">
            <p class="fio"><?= $teacher['surname'] . " " . $teacher['name'] . " " . $teacher['patronymic'] ?></p>
            <p class="job_title"><?= $teacher['job_title'] ?></p>
            <p class="info"><?= $teacher['information'] ?></p>
        </div>
    <?php endforeach;?>
</div>

    <!-- <?= !empty($departament->name_ru) ? nl2br(htmlspecialchars($departament->{LanguageHelper::name()})) : '( Здесь ничего не задано )' ?> -->

</div>