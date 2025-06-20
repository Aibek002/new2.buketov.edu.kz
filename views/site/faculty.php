<?php
use app\components\LanguageHelper;
use yii\helpers\Html;

?>

<div class="faculty-hero">
    <div class="faculty-overlay">
        <h1>
            <br>
            <?= !empty($faculty) && !empty($faculty->{LanguageHelper::name()}) ? htmlspecialchars($faculty->{LanguageHelper::name()}) : '( Здесь ничего не задано )' ?>
            <?= strcasecmp($name, 'Военная кафедра') === 0 ? '' : Yii::t('app', 'faculty')  ?>

        </h1>
    </div>
</div>

<div class="first-flex-faculty p-5 my-5">
    <div class="faculty-container">

        <div class="faculty-text">
            <?php if (!empty($faculty)): ?>
                <h2><?= !empty($faculty->{LanguageHelper::welcome()}) ? nl2br(htmlspecialchars($faculty->{LanguageHelper::welcome()})) : '( Здесь ничего не задано )' ?>
                </h2>
                <p><?= !empty($faculty->{LanguageHelper::information()}) ? nl2br(htmlspecialchars($faculty->{LanguageHelper::information()})) : '( Здесь ничего не задано )' ?>
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
            <p><?= Html::a(Yii::t('app', 'Для просмотра истории факультета перейдите по ссылке'), ['site/history-faculty', 'faculty_id' => $faculty_id]) ?>
            </p>
        </div>

        <div class="faculty-image">
            <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png" alt="Декан факультета" />
        </div>

    </div>
    <?php if ($name != 'Военная кафедра'): ?>

        <h1 class="department-title">Кафедры</h1>

        <div class="departments-container">
            <?php if (!empty($departament)): ?>
                <?php foreach ($departament as $departament_item): ?>
                    <div class="department-box">
                        <h3> <?= Html::a(
                            $departament_item->{LanguageHelper::name()}
                            ,
                            ['site/departament', 'departament_id' => $departament_item->id]
                        ) ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Departament нету</p>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- <?= !empty($departament->name_ru) ? nl2br(htmlspecialchars($departament->{LanguageHelper::name()})) : '( Здесь ничего не задано )' ?> -->

</div>