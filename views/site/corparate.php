<?php
$lang = Yii::$app->language;

use app\assets\CorporateAsset;



CorporateAsset::register($this);
$this->title = Yii::t("app", "Corporate governance");

?>
<div class="corporate-container">
    <div class="title-page">
        <?= $this->title ?>
    </div>
    <div class="select-content-corporate-governance">
        <button id="loadBtn" data-lang="<?= $lang ?>">Единственный акционер</button>
        <button id="loadBtn" data-lang="<?= $lang ?>">Совет директоров</button>
        <button id="loadBtn" data-lang="<?= $lang ?>">Правление</button>
        <button id="loadBtn" data-lang="<?= $lang ?>">Устойчивое развитие</button>
        <button id="loadBtn" data-lang="<?= $lang ?>">Документация и отчетность</button>

    </div>

    <div class="title-content">
        <?= Yii::t("app", "Решения Единственного акционера") ?>
    </div>
    <div class="content-corporate-governance">
        <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
        <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
        <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
        <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
        <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
        <button onclick="loadPDF('/pdf/file6.pdf')">2025</button>


    </div>
    <embed id="pdfViewer"src="" width="50%" height="600" type="application/pdf">

</div>
<div id="result"></div>
</div>