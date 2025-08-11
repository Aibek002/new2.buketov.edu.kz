<?php
$lang = Yii::$app->language;

use app\assets\CorporateAsset;
use yii\helpers\Html;



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
    <div class=" container my-5 sole-shareholder active">
        <h2 class="title-content"><?= Yii::t("app", "Decisions of the Sole Shareholder") ?></h2>

        <?php foreach ($year as $year):
            if ($year->ref_corporate_governance === 1): ?>
                <?php if ($year->language_file == $lang): ?>
                    <div class="title-content">
                        <h5 class="mb-0">
                            <?= Yii::t("app", "Decisions of the Sole Shareholder") ?> — <?= Html::encode($year->sort_id) ?>
                        </h5>
                    </div>

                    <div class="button-section">
                        <?php foreach ($pdf as $pdf_item):
                            if ($pdf_item->ref_corporate_governance === 1):
                                ?>

                                <?php if ($pdf_item->sort_id == $year->sort_id && $lang == $pdf_item->language_file): ?>

                                    <button onclick='loadPDF("<?= $pdf_item->path_file . $pdf_item->fileName ?>")'>
                                        <?= Html::encode($pdf_item->name_url) ?>
                                    </button>

                                <?php endif ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif ?>
            <?php endif ?>

        <?php endforeach; ?>

        <div class="text-center">
            <embed class="pdfViewer border rounded mt-4" src="" width="80%" height="600" type="application/pdf">
        </div>
    </div>

</div>
<div class="board-of-directors">
    <div class="title-content">
        <?= Yii::t("app", "Board of Directors") ?>
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
        <?= Yii::t("app", "Meeting of the board of directors") ?>
    </div>
    <?php
    $grouped = [];
    foreach ($pdf as $pdf_item) {
        if ($pdf_item->ref_corporate_governance === 2 && str_contains($pdf_item->sort_id, 'Заседание Совета директоров')) {
            if (Yii::$app->language === $pdf_item->language_file) {
                $grouped[$pdf_item->sort_id][] = $pdf_item;

            }
        }
    }
    ?>

    <div class="button-section">
        <?php foreach ($grouped as $sort_id => $items): ?>
            <?php
            $safe_id = str_replace([' ', '/'], '-', $sort_id);
            $parts = explode('/', $sort_id);
            $year = end($parts);
            ?>

            <button onclick="openBoardMeeting('<?= $safe_id ?>')"><?= htmlspecialchars($year) ?></button>
        <?php endforeach; ?>

    </div>

    <?php foreach ($grouped as $sort_id => $items): ?>
        <?php $safe_id = str_replace([' ', '/'], '-', $sort_id); ?>

        <div class="board-meeting <?= htmlspecialchars($safe_id) ?>">
            <h3 class="title-content"><?= htmlspecialchars($safe_id) ?>
                <div class="button-section">
                    <?php foreach ($items as $item): ?>
                        <?php $path = str_replace(['/var/www/html/yii2/', '..'], '', $item->path_file); ?>
                        <button
                            onclick="loadPDFBoardGovernance('<?= $path . $item->fileName ?>')"><?= $item->name_url ?></button>

                    <?php endforeach; ?>
                </div>

            </h3>
        </div>
    <?php endforeach; ?>


    <div class="title-content">
        <?= Yii::t("app", "Committees of the Board of Directors") ?>
    </div>
    <div class="button-section">
        <button onclick="selectCommittee('audit')"><?= Yii::t('app', 'Audit Committee') ?></button>
        <button onclick="selectCommittee('hr-rem')"><?= Yii::t('app', 'HR and Remuneration Committee') ?></button>
        <button onclick="selectCommittee('str-plan')"><?= Yii::t('app', 'Strategic Planning Committee') ?></button>

    </div>
    <div class="button-section points">
        <button data-point="position" data-lang="<?= Yii::$app->language ?>"><?= Yii::t('app', 'Position') ?></button>
        <button data-point="composition"><?= Yii::t('app', 'Composition') ?></button>
        <button data-point="plan"><?= Yii::t('app', 'Plan') ?></button>
        <button data-point="meeting"><?= Yii::t('app', 'Meeting') ?></button>
    </div>
    <?php $documents_committee = []; ?>
    <?php foreach ($pdf as $pdf_item): ?>
        <?php if (str_contains($pdf_item->sort_id, 'Комитет') && $pdf_item->language_file === Yii::$app->language ): ?>
                <?php
                $parts = str_replace([' ', '/'], '-', $pdf_item->sort_id);
                $documents_committee[$parts][] = $pdf_item;
                ?>


        <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($documents_committee as $parts => $items): ?>
        <h2 class="title-content position-committee <?= $parts ?>">
            <?= str_replace(['-'], ' ', $parts) ?>
            <div class="button-section">
                <?php foreach ($items as $item): ?>
                    <?php $path = str_replace(['var/www/html/yii2/', '../'], '', $item->path_file) ?>
                    <button onclick="loadPDFBoardGovernance('<?= $path . $item->fileName ?>')"><?= $item->name_url ?></button>
                <?php endforeach; ?>

            </div>
        </h2>

    <?php endforeach; ?>


    <div class="title-content">
        <?= Yii::t("app", "Corporate events") ?>
    </div>
    <?php
    $grouped_corp_events = [];
    foreach ($pdf as $pdf_item) {
        if ($pdf_item->ref_corporate_governance === 2 && str_contains($pdf_item->sort_id, 'Корпоративные события')) {
            if (Yii::$app->language === $pdf_item->language_file) {

                $grouped_corp_events[$pdf_item->sort_id][] = $pdf_item;
            }
        }
    } ?>
    <div class="button-section">
        <?php foreach ($grouped_corp_events as $sort_id => $items): ?>
            <?php
            $safe_id = str_replace([' ', '/'], '-', $sort_id);
            $parts = explode('/', $sort_id);
            $year = end($parts); ?>

            <button
                onclick="loadPDFBoardGovernance('<?= htmlspecialchars($safe_id) ?>')"><?= htmlspecialchars($year) ?></button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($grouped_corp_events as $sort_id => $items): ?>
        <?php $safe_id = str_replace([' ', '/'], '-', $sort_id); ?>
        <div class="board-events <?= htmlspecialchars($safe_id) ?>">
            <h3 class="title-content">
                <?= Yii::t("app", "Corporate events") ?> -
                <?= $year ?>
                <div class="button-section">
                    <?php foreach ($items as $item): ?>


                        <button><?= $item->name_url ?></button>

                    <?php endforeach; ?>
                </div>
        </div>
        </h3>
    <?php endforeach; ?>
    <!-- <button onclick="loadPDF('/pdf/file1.pdf')">2020</button>
        <button onclick="loadPDF('/pdf/file2.pdf')">2021</button>
        <button onclick="loadPDF('/pdf/file3.pdf')">2022</button>
        <button onclick="loadPDF('/pdf/file4.pdf')">2023</button>
        <button onclick="loadPDF('/pdf/file5.pdf')">2024</button>
        <button onclick="loadPDF('/pdf/file6.pdf')">2025</button> -->



    <!-- <div class="title-content">
        <?= Yii::t("app", "Committees of the Board of Directors") ?>
    </div>
    <div id="committee-of-board" class="board-of-directors-section">

        <div class="container-board-of-directors"></div>
    </div> -->
    <div class="text-center">
        <embed class="board_governance_pdf border rounded mt-4" src="" width="80%" height="600" type="application/pdf">
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