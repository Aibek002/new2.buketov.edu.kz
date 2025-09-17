<?php
use app\components\LanguageHelper;
use yii\helpers\Html;

?>

<div class="faculty-hero">
    <div class="faculty-overlay">
        <h1>
            <br>
            <?= !empty($faculty) && !empty($faculty->{LanguageHelper::name()}) ? htmlspecialchars($faculty->{LanguageHelper::name()}) : '( Здесь ничего не задано )' ?>
            <?= strcasecmp($name, 'Военная кафедра') === 0 ? '' : Yii::t('app', 'faculty') ?>

        </h1>
    </div>
</div>

<div class="first-flex-faculty" style="margin:auto; padding: 2vw 5vw;">

    <!-- Блок декана -->
    <div style="display: flex; align-items: center; justify-content: space-between; 
                background: linear-gradient(135deg, #f0f4f8, #e3ebf6); 
                border-radius: 25px; padding: 40px; 
                box-shadow: 0 12px 30px rgba(0,0,0,0.1); 
                transition: transform 0.3s; margin-bottom: 50px;">

        <!-- Текст -->
        <div style="flex: 1; padding-right: 40px; font-family: 'Segoe UI', sans-serif; color: #2c3e50;">
            <?php if (!empty($faculty)): ?>
                <h2 style="font-size: 30px; font-weight: bold; margin-bottom: 20px; color:#1a2a5b;">
                    <?= !empty($faculty->{LanguageHelper::welcome()})
                        ? nl2br(htmlspecialchars($faculty->{LanguageHelper::welcome()}))
                        : '( Здесь ничего не задано )' ?>
                </h2>
                <p style="line-height: 1.7; font-size: 16px; margin-bottom: 20px;">
                    <?= !empty($faculty->{LanguageHelper::information()})
                        ? nl2br(htmlspecialchars($faculty->{LanguageHelper::information()}))
                        : '( Здесь ничего не задано )' ?>
                </p>
            <?php else: ?>
                <h2 style="font-size: 30px; font-weight: bold; margin-bottom: 20px; color:#1a2a5b;">
                    ( Здесь ничего не задано )
                </h2>
                <p style="line-height: 1.7; font-size: 16px; margin-bottom: 20px;">
                    ( Здесь ничего не задано )
                </p>
            <?php endif; ?>

            <b style="font-size: 20px; color:#34495e;">
                <?= !empty($dean->{LanguageHelper::name()})
                    ? nl2br(htmlspecialchars($dean->{LanguageHelper::surname()} . " " . $dean->{LanguageHelper::name()} . " " . $dean->{LanguageHelper::patronymic()}))
                    : '( Здесь ничего не задано )' ?>
            </b><br>

            <span style="font-size: 16px; color:#666;">
                <?= Yii::t('app', 'Dean'); ?> -
                <?= !empty($dean->{LanguageHelper::job_title()})
                    ? nl2br(htmlspecialchars($dean->{LanguageHelper::job_title()}))
                    : '( Здесь ничего не задано )' ?>
            </span>

            <p style="margin-top:12px;">
                Email:
                <a href="mailto:<?= !empty($dean->email) ? $dean->email : '#' ?>"
                    style="color:var(--indigoblue-font)var(--indigoblue-font); text-decoration:none; font-weight:600;">
                    <?= !empty($dean->email)
                        ? nl2br(htmlspecialchars($dean->email))
                        : '( Здесь ничего не задано )' ?>
                </a>
            </p>

            <a href="<?= Yii::$app->urlManager->createUrl(['site/history-faculty', 'faculty_id' => $faculty_id]) ?>"
                style="display:inline-block; margin-top:15px; 
                      background:var(--indigoblue); color:#fff; 
                      padding:12px 22px; border-radius:12px; 
                      text-decoration:none; font-size:15px; 
                      box-shadow:0 6px 15px rgba(0,123,255,0.3); 
                      transition: all 0.3s;">
                <?= Yii::t('app', 'История факультета →') ?>
            </a>
        </div>

        <!-- Фото декана -->
        <div style="flex: 0 0 280px; text-align: center;">
            <div style="position: relative; display: inline-block; transition: all 0.3s;">
                <img src="<?= !empty($dean->image)
                    ? nl2br(htmlspecialchars($dean->image->image))
                    : 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>" alt="Декан факультета"
                    style="width: 260px; height: 260px; border-radius: 50%; 
                            object-fit: cover; box-shadow: 0 10px 25px rgba(0,0,0,0.25); 
                            border: 6px solid #fff; background: #f0f0f0; 
                            transition: transform 0.4s, box-shadow 0.4s;">
                <div style="position: absolute; bottom: 15px; right: 15px; 
                            background: #007BFF; color:#fff; border-radius: 50%; 
                            width: 55px; height: 55px; 
                            display:flex; align-items:center; justify-content:center; 
                            font-size:22px; box-shadow:0 4px 12px rgba(0,0,0,0.25);">
                    🎓
                </div>
            </div>
        </div>
    </div>

    <?php if ($name != 'Военная кафедра'): ?>
        <h1
            style="font-size: 32px; text-align: center; font-family:'Segoe UI',sans-serif; color:#1a2a5b; margin-bottom: 30px; font-weight: bold;">
            Кафедры </h1>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
                    gap: 25px; margin-bottom:50px;">
            <?php if (!empty($departament)): ?>
                <?php foreach ($departament as $departament_item): ?>
                    <div style="background:#fff; border-radius:15px; padding:25px; 
                                text-align:center; box-shadow:0 8px 20px rgba(0,0,0,0.1); 
                                transition: transform 0.3s, box-shadow 0.3s;">
                        <h3 style="font-size:18px; margin:0;">
                            <?= Html::a(
                                $departament_item->{LanguageHelper::name()},
                                ['site/departament', 'departament_id' => $departament_item->id],
                                ['class' => 'link-button', 'style' => 'text-decoration:none; color:var(--indigoblue-font); font-weight:600;']
                            ) ?>
                        </h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Departament нету</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>