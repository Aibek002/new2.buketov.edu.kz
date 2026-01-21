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
        <?= Yii::t("app", "The university currently offers several study formats for foreign citizens") ?>
    </div>
    <div class="button-section">
        <button><?= Yii::t("app","Foundation.<br> Kazakh language training program")?></button>
        <button><?= Yii::t("app","Foundation.<br>  Rusian language training program")?></button>
        <button><?= Yii::t("app","Foundation.<br>  English language training program")?></button>
        <button><?= Yii::t("app","'Russian as a Foreign Language' program")?></button>
        <button><?= Yii::t("app","Exchange programs")?></button>
    </div>
    <div class="text-content">
        <?= Yii::t("app","Send a request or a question about the possibility of studying at the university") ?>
    </div>
</div>
