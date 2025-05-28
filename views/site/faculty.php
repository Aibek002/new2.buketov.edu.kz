<?php 
use app\components\LanguageHelper;

?>

<div class="faculty-hero">
    <div class="faculty-overlay">
        <h1>
            <br>
            <?= !empty($faculty) && !empty($faculty->{LanguageHelper::name()}) ? htmlspecialchars($faculty->{LanguageHelper::name()}) : '( Здесь ничего не задано )' ?>
            <?php echo Yii::t('app', 'faculty'); ?>
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
                <b><?= !empty($dean->{LanguageHelper::name()}) ? nl2br(htmlspecialchars($dean->{LanguageHelper::surname()} . " " . $dean->{LanguageHelper::name()} . " " . $dean->{LanguageHelper::patronymic()})) : '( Здесь ничего не задано )' ?> </b> -

                <?= !empty($dean->{LanguageHelper::job_title()}) ? nl2br(htmlspecialchars($dean->{LanguageHelper::job_title()})) : '( Здесь ничего не задано )' ?>

            </p>
            <p>Email: <a href="">
                <?= !empty($dean->email) ? nl2br(htmlspecialchars($dean->email)) : '( Здесь ничего не задано )' ?>,
            </a></p>
            <p>Для просмотра истории факультета перейдите по ссылке</p>
        </div>

        <div class="faculty-image">
            <img src="https://cdn-icons-png.flaticon.com/512/4519/4519678.png"
                alt="Декан факультета" />
        </div>
    </div>
    <h1 class="department-title">Кафедры</h1>

    <div class="departments-container">
        <div class="department-box">
            <h3>Кафедра 1</h3>
        </div>
        <div class="department-box">
            <h3>Кафедра 2</h3>
        </div>
        <div class="department-box">
            <h3>Кафедра 3</h3>
        </div>
        <div class="department-box">
            <h3>Кафедра 4</h3>
        </div>
    </div>

</div>