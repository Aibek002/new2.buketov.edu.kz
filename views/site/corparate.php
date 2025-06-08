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
    <div class="select-section">
        <button id="loadSoleShareHolderBtn"
            data-lang="<?= $lang ?>"><?= Yii::t("app", "Decisions of the Sole Shareholder") ?>
        </button>
        <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Board of Directors") ?>
        </button>
        <button id="loadGovernanceBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Governance") ?>
        </button>
        <button id="loadSustainableDevelopmentBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Sustainable Development") ?>
        </button>
        <button id="loadDocumentsAndReportingBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Documents And Reporting") ?>
        </button>

    </div>
    <div class="sole-shareholder active">
        <div class="title-content">
            <?= Yii::t("app", "Decisions of the Sole Shareholder") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
            <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025</button>


        </div>
        <embed class="pdfViewer" src="" width="50%" height="600" type="application/pdf">
    </div>
    <div class="board-of-directors">
        <div class="title-content">
            <?= Yii::t("app", "Composition of the Board of Directors") ?>
        </div>
        <div id="board-members" class="board-of-directors-section">

            <div class="container-board-of-directors"></div>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Corporate Secretary") ?>
        </div>
        <div id="secretary" class="board-of-directors-section">

            <div class="container-board-of-directors"></div>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Meeting of the board of directors") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
            <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025</button>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Internal Audit Service") ?>
        </div>
        <div id="audit-members" class="board-of-directors-section">

            <div class="container-board-of-directors"></div>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Anti-corruption Compliance Service") ?>
        </div>
        <div id="anti-corruption" class="board-of-directors-section">

            <div class="container-board-of-directors"></div>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Documents Anti-corruption Compliance Service") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')"><?= Yii::t('app', 'Regulation on ACS') ?></button>
            <button onclick="loadPDF('/pdf/file2.pdf')"><?= Yii::t('app', 'Reports') ?></button>
            <button onclick="loadPDF('/pdf/file3.pdf')"><?= Yii::t('app', 'ACS Documents') ?></button>
            <button onclick="loadPDF('/pdf/file4.pdf')"><?= Yii::t('app', 'Comprehensive Work Plans') ?></button>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Corporate events") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
            <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025</button>


        </div>
        
        <div class="title-content">
            <?= Yii::t("app", "Committees of the Board of Directors") ?>
        </div>
           <div id="committee-of-board" class="board-of-directors-section">

            <div class="container-board-of-directors"></div>
        </div>
    </div>
    <div class="governance">
        <div class="title-content">
            <?= Yii::t("app", "Composition of the Governance") ?>
        </div>
        <div class="container-governance"></div>
        <div class="title-content">
            <?= Yii::t("app", "Board meeting") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
            <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025</button>
        </div>

    </div>

    <div class="sustainable_development">
        <div class="title-content">
            <?= Yii::t("app", "Sustainable Development") ?>
        </div>
    <!-- </div>
    <div class="DocumentsAndReporting">
        <div class="title-content">
            <?= Yii::t("app", "Documents And Reporting") ?>
        </div>
        <div class="content-corporate-documents">
            <button onclick="loadPDF('/pdf/file1.pdf')"><?= Yii::t('app', 'Corporate documents') ?></button>
            <button onclick="loadPDF('/pdf/file2.pdf')"><?= Yii::t('app', 'Annual reports of the Company') ?></button>
            <button onclick="loadPDF('/pdf/file3.pdf')"><?= Yii::t('app', 'Annual financial statements') ?></button>
            <br>

        </div>
    </div> -->
</div>


</>