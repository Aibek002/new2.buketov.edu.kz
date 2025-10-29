<?php

use app\assets\InternationalStudentsAsset;
InternationalStudentsAsset::register($this);

$this->title = Yii::t("app", "International students");

?>

<div class="container p-5">
    <div class="title-page">
        <?= Yii::t("app", 'International students'); ?>
    </div>
    <div class="text-content">
        <span><?= Yii::t("app", "The university currently offers several study formats for foreign citizens") ?></span>
    </div>
    <div class="title-content">
        <span class="text-center"><?= Yii::t("app", "Foundation") ?></span>

        <div class="button-section">
            <button
                onclick="document.getElementById('foundation-kaz-modal').style.display='flex';"><?= Yii::t("app", "Kazakh language training program") ?></button>
            <button onclick="document.getElementById('foundation-rus-modal').style.display='flex';"><?= Yii::t("app", "Rusian language training program") ?></button>
            <button onclick="document.getElementById('foundation-eng-modal').style.display='flex';"><?= Yii::t("app", "English language training program") ?></button>
            <button
                onclick="document.getElementById('program-rus-modal').style.display='flex';"><?= Yii::t("app", "'Russian as a Foreign Language' program") ?></button>
            <button
                onclick="document.getElementById('exchange-modal').style.display='flex';"><?= Yii::t("app", "Exchange programs") ?></button>

        </div>
    </div>
    <!-- <div class="text-content">
        <span><?= Yii::t("app", "Send a request or a question about the possibility of studying at the university") ?></span>
    </div> -->

    <div id="foundation-kaz-modal" class="modal"
        style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
        <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 95%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
        height: 80%;
    ">
            <button class="close-btn" onclick="document.getElementById('foundation-kaz-modal').style.display='none';"
                style="
            float: right;
            margin-left: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            line-height: 1;
            border: none;
            background: none;
            text-align: end;
        ">&times;</button>

            <h2 style="color: #1f3b6e; margin-top: 0; border-bottom: 2px solid #2c5ca9; padding-bottom: 10px;">
                <?= Yii::t("app", "Kazakh language training program") ?>

            </h2>
            <?= Yii::t("app", "One-year Kazakh language training program. It takes into account the student's starting level. Persons without experience of learning the Kazakh language are accepted. Participants of the program will be offered advanced learning technologies that provide immersion in the language environment and develop skills of oral and written speech, as well as its perception.
Upon completion of the program, the student will be proficient in Kazakh at least at the B1 level.") ?>


        </div>
    </div>
    <div id="foundation-rus-modal" class="modal"
        style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
        <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 95%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
        height: 80%;
    ">
            <button class="close-btn" onclick="document.getElementById('foundation-rus-modal').style.display='none';"
                style="
            float: right;
            margin-left: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            line-height: 1;
            border: none;
            background: none;
            text-align: end;
        ">&times;</button>

            <h2 style="color: #1f3b6e; margin-top: 0; border-bottom: 2px solid #2c5ca9; padding-bottom: 10px;">
                <?= Yii::t("app", "Russian language training program") ?>

            </h2>
            <?= Yii::t("app", "One-year Russian language training program. It takes into account the student's starting level. People without experience of learning Russian are accepted.Participants of the program will be offered advanced learning technologies that provide immersion in the language environment and develop skills of oral and written speech, as well as its perception.
Upon completion of the program, the student will have at least a B1 level command of the Russian language.") ?>


        </div>
    </div>
    <div id="foundation-eng-modal" class="modal"
        style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
        <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 95%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
        height: 80%;
    ">
            <button class="close-btn" onclick="document.getElementById('foundation-eng-modal').style.display='none';"
                style="
            float: right;
            margin-left: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            line-height: 1;
            border: none;
            background: none;
            text-align: end;
        ">&times;</button>

            <h2 style="color: #1f3b6e; margin-top: 0; border-bottom: 2px solid #2c5ca9; padding-bottom: 10px;">
                <?= Yii::t("app", "English language training program") ?>

            </h2>
            <?= Yii::t("app", "One-year English language training program. It takes into account the student's starting level. The minimum level of language proficiency should be at least A1. The program participants will be offered advanced learning technologies that develop all types of speech activity.
Upon completion of the program, the student will be proficient in English at least at the B1 level.") ?>


        </div>
    </div>
    <div id="program-rus-modal" class="modal"
        style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
        <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 95%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
        height: 80%;
    ">
            <button class="close-btn" onclick="document.getElementById('program-rus-modal').style.display='none';"
                style="
            float: right;
            margin-left: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            line-height: 1;
            border: none;
            background: none;
            text-align: end;
        ">&times;</button>

            <h2 style="color: #1f3b6e; margin-top: 0; border-bottom: 2px solid #2c5ca9; padding-bottom: 10px;">
                <?= Yii::t("app", "The program 'Russian as a foreign language'") ?>

            </h2>
            <?= Yii::t("app", "One-year English language training program. It takes into account the student's starting level. The minimum level of language proficiency should be at least A1. The program participants will be offered advanced learning technologies that develop all types of speech activity.
Upon completion of the program, the student will be proficient in English at least at the B1 level.The program is implemented in the bachelor's degree format and is designed for 4 years of study, or 240 credits. The student's starting level should be at least A2. The program's profile is aimed at training a Russian language teacher for a foreign-speaking audience. Students will study theoretical linguistics courses, a practical Russian language course, and methods of teaching it in a foreign language classroom. The training takes place in conditions of maximum immersion in the language environment, and provides live communication with native speakers of the Russian language. At the initial stage of training, English can be used for mediation purposes. The graduate of the program will be proficient in Russian at the C1 level.") ?>


        </div>
    </div>
</div>
<div id="exchange-modal" class="modal" style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
    <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 95%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
        height: 80%;
    ">
        <button class="close-btn" onclick="document.getElementById('exchange-modal').style.display='none';" style="
            float: right;
            margin-left: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            line-height: 1;
            border: none;
            background: none;
            text-align: end;
        ">&times;</button>

        <h2 style="color: #1f3b6e; margin-top: 0; border-bottom: 2px solid #2c5ca9; padding-bottom: 10px;">
            <?= Yii::t("app", "Exchange programs") ?>

        </h2>
        <?= Yii::t("app", "The University has experience in implementing exchange programs that can be tailored to the needs of incoming students. Before starting negotiations, you should study the proposals of our faculties and choose educational programs.
By contacting the Office of International Cooperation, you will receive a list of subjects taught in the selected program, including in English.") ?>

    </div>
</div>