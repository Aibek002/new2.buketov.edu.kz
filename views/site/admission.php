<?php $this->title = Yii::t("app", "Admission Committee");



use app\components\LanguageHelper;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use yii\widgets\ActiveForm;
use app\assets\AdmissionAsset;
AdmissionAsset::register($this);
$lang = Yii::$app->language;
?>

<div class="container p-5">
    <div class="title-page">
        <?= Yii::t("app", "Admission Committee") ?>

    </div>
    <p style="font-size: 1.25rem; color: #555; margin-bottom: 30px; text-align: center;">
        <?= Yii::t('app', 'The admission committee is organized by the responsible secretary') ?>
    </p>

    <div
        style="margin: 40px auto; padding: 20px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); position: relative; display: flex;">
        <div class="person-card">

            <div class="person-img"
                style="width: 250px; height: 250px; overflow: hidden; flex-shrink: 0; border-radius: 8px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2); background-color: #f9f9f9;">
                <img width="100%" alt="<?= Yii::t('app', 'Barykova Alena Rudolfovna') ?>"
                    src="/files/image_avatar_staff/Administrative-Services/ Barikova_ Alena/Приемная_комиссия-removebg-preview.jpg"
                    style="width: 100%; height: 100%; object-fit: contain; display: block; border-radius: 8px;">
            </div>

            <div class="person-info" style="padding-right: 20px;">
                <p class="person-fio"
                    style="font-size: 1.8rem; font-weight: 700; color: #2c5ca9; margin-bottom: 10px; text-transform: uppercase;">
                    <?= Yii::t('app', 'Barykova Alena Rudolfovna') ?>
                </p>
                <p class="person-position" style="font-size: 1.1rem; color: #6a6a6a; margin-bottom: 20px;">
                    <?= Yii::t('app', 'Responsible Secretary of the Admission Committee') ?>
                </p>
                <p class="person-info" style="font-size: 0.95rem; color: #555;">
                    <?= Yii::t('app', 'Applicants can contact the Admission Committee for consultation on the admission rules, deadlines, and document submission procedures, as well as to attend preparatory courses for the UNT subjects.') ?>
                </p>
            </div>

            <div class="person-email"
                style="flex-shrink: 0; display: flex; flex-direction: column; gap: 15px; min-width: 200px; padding-left: 20px; border-left: 1px solid #eee;">
                <div class="email" style="display: flex; align-items: center;">
                    <img src="/bg-images/svg/iconEmail.svg" style="width: 24px; height: 24px; margin-right: 10px;">
                    <a href="mailto:priemka@buketov.edu.kz" style="color: #2c5ca9;">priemka@buketov.edu.kz</a>
                </div>
                <div class="phone" style="display: flex; align-items: center;">
                    <img src="/bg-images/svg/iconPhone.svg" style="width: 24px; height: 24px; margin-right: 10px;">
                    <a href="tel:+77212900270" style="color: #2c5ca9;">+7 7212 90-02-70</a>
                </div>
                <div class="phone" style="display: flex; align-items: center;">
                    <img src="/bg-images/svg/iconPhone.svg" style="width: 24px; height: 24px; margin-right: 10px;">
                    <a href="tel:+77212356405" style="color: #2c5ca9;">+7 7212 35-64-05</a>
                </div>
            </div>
        </div>
    </div>


    <div class="select-section">
        <button onclick="openSection('bakalavr')">
            <?= Yii::t("app", "Bakalavriat") ?>
        </button>
        <button onclick="openSection('magistrant')">
            <?= Yii::t("app", "Magistrant") ?>
        </button>
        <button onclick="openSection('doctorant')">
            <?= Yii::t("app", "Doctorant") ?>
        </button>
    </div>

    <div class="bakalavriat <?php echo ($type == 'bachelor') ? 'active' : ''; ?>">
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Bakalavriat") ?>
            </div>
            <div class="text-content text-start">
                <?= Yii::t('app', 'This is the first level of university education.') ?><br><br>

                <?= Yii::t('app', 'The duration of bachelor’s studies may vary. If an applicant enters after secondary school, the study period is 4 years.') ?><br><br>

                <?= Yii::t('app', 'Applicants who graduated from college can study for 3 years.') ?><br><br>

                <?= Yii::t('app', 'Applicants with higher education can study for only 2 years.') ?><br><br>

                <?= Yii::t('app', 'A mandatory condition for obtaining a diploma is the completion of at least 240 credits.') ?><br>
                <?= Yii::t('app', 'Training is conducted in two languages: Kazakh and Russian.') ?><br><br>

                <strong class="text-white"><?= Yii::t('app', 'Online registration (registration is valid during the admission period from June 20 to August 25)') ?></strong><br>
            </div>
        </div>



        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "General admission rules and deadlines") ?>
            </div>


            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 1): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                            <button
                                onclick="openGeneralRulesPdf('/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item['path'] ?>','bachelor')">
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Educational programs") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 1): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="p-5"
            style=" min-height: 100%; background: var(--indigoblue); border-radius:20px; border:1px solid var(--indigoblue-font); margin-block:50px">
            <div class="title-content-text">
                <?= Yii::t("app", "Form for selecting profile subjects and available professions") ?>
            </div>
            <strong
                class="text-white p-2"><?= Yii::t('app', '10 popular professions of the past year (2025) in Kazakhstan (based on university admission data)') ?>
                :
            </strong>

            <ul type="1" class="popular-list">
                <li><?= Yii::t('app', '6B01705 – Foreign language: two foreign languages (English) — 572') ?></li>
                <li><?= Yii::t('app', '6B01403 – Physical education and sport — 262') ?></li>
                <li><?= Yii::t('app', '6B01701 – Kazakh language and literature — 209') ?></li>
                <li><?= Yii::t('app', '6B07201 – Pharmaceutical production technology — 192') ?></li>
                <li><?= Yii::t('app', '6B04201 – Jurisprudence — 164') ?></li>
                <li><?= Yii::t('app', '6B01601 – History — 140') ?></li>
                <li><?= Yii::t('app', '6B06103 – Information systems — 133') ?></li>
                <li><?= Yii::t('app', '6B03106 – Psychology — 110') ?></li>
                <li><?= Yii::t('app', '6B05201 – Ecology — 90') ?></li>
                <li><?= Yii::t('app', '6B04204 – Judicial and prosecutorial activity — 89') ?></li>
            </ul>

            <div class="button-section">
                <button onclick="openForm('view-form')">
                    <?= Yii::t('app', 'Select specialization') ?>
                </button>
            </div>
            <div class="select-form-by-specialization">
                <div class="select-section">
                    <button onclick="openForm('search-by-ent')">
                        <?= Yii::t('app', 'Search by ENT') ?>
                    </button>
                    <button onclick="openForm('search-by-specialization')">
                        <?= Yii::t('app', 'Search by Specialization') ?>
                    </button>
                    <button onclick="openForm('search-by-college')">
                        <?= Yii::t('app', 'Search by College') ?>
                    </button>
                </div>
                <div class="form-search-by-ent active">
                    <h1 class="title-form">
                        <?= Yii::t('app', 'Choose a specialty by ENT subject') ?>
                    </h1>
                    <select name="subject_id1" id="subject_id1" class="form-control mb-3">
                        <option value=""><?= Yii::t('app', 'Select subject 1') ?></option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject->id ?>"><?= Html::encode($subject->{LanguageHelper::name()}) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="subject_id2" id="subject_id2" class="form-control mb-3">
                        <option value=""><?= Yii::t('app', 'Select subject 2') ?></option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject->id ?>"><?= Html::encode($subject->{LanguageHelper::name()}) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button onclick="changeTitle('ent')" id="view"
                        data-lang="<?= $lang = Yii::$app->language ?>"><?= Yii::t('app', 'View') ?></button>

                </div>
                <div class="form-search-by-specialization">
                    <h1 class="title-form">
                        <?= Yii::t('app', 'Choose specialty at university') ?>

                    </h1>
                    <select name="profession" id="profession" class="form-control mb-3">
                        <option value=""><?= Yii::t('app', 'Select university specialty') ?></option>
                        <?php foreach ($profession_university as $profession_university_item): ?>
                            <option value="<?= $profession_university_item->id ?>">
                                <?= Html::encode($profession_university_item->{LanguageHelper::name()}) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button onclick="changeTitle('specialization')" id="viewSpecialization"
                        data-lang="<?= $lang = Yii::$app->language ?>"><?= Yii::t('app', 'View') ?></button>
                </div>
                <div class="form-search-by-college">
                    <h1 class="title-form">
                        <?= Yii::t('app', 'Choose specialty by college specialty') ?>
                    </h1>
                    <input data-lang="<?= Yii::$app->language ?>" type="text" id="search-profession-college"
                        placeholder="<?= Yii::t('app', 'Search for a college specislization') ?>"
                        id="search-profession-college">

                </div>
                <div class="result-title-ent">
                    <p><?= Yii::t('app', 'Profession') ?></p>
                    <p><?= Yii::t('app', 'Semi-passing points') ?></p>
                    <p><?= Yii::t('app', 'Passing points') ?></p>
                </div>
                <div class="result-title-specialization">
                    <p><?= Yii::t('app', 'Profession') ?></p>
                    <p><?= Yii::t('app', 'ENT') ?></p>
                    <p><?= Yii::t('app', 'Semi-passing points') ?></p>
                    <p><?= Yii::t('app', 'Passing points') ?></p>
                </div>
                <div class="result-title-college">
                    <p><?= Yii::t('app', 'College Profession') ?></p>
                    <p><?= Yii::t('app', 'Profession') ?></p>
                    <p><?= Yii::t('app', 'ENT') ?></p>
                    <p><?= Yii::t('app', 'Passing points') ?></p>
                </div>

                <div class="result-profession-bakalavr"></div>
            </div>
        </div>
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Tuition fees") ?>
            </div>


            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) (int) $pdf_item['skill_level_id'] === 1): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] == 3): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>

            </div>
        </div>
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "For applicants to creative and pedagogical fields") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 1): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 4): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>

            </div>
        </div>

        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Useful information") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 1): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div class="magistrant <?php echo ($type == 'magistracy') ? 'active' : ''; ?>">
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Magistrant") ?>
            </div>

        </div>
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "General admission rules and deadlines") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 2): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Educational programs") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 2): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>


        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Tuition fees") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 2): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 3): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>


        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Useful information") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 2): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div class="doctorant <?php echo ($type == 'doctoral') ? 'active' : ''; ?>">
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Doctorant") ?>
            </div>

        </div>
        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "General admission rules and deadlines") ?>
            </div>

            <div class="button-section">

                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 3): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Educational programs") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 3): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>


        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Tuition fees") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 3): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 3): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="title-content">
            <div class="title-content-text">
                <?= Yii::t("app", "Useful information") ?>
            </div>

            <div class="button-section">
                <?php foreach ($pdf as $pdf_item): ?>
                    <?php if ($pdf_item['lang_pdf'] === $lang && (int) $pdf_item['skill_level_id'] === 3): ?>

                        <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                            <button
                                onclick='openGeneralRulesPdf("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                                <?= $pdf_item["name_url"] ?>
                            </button>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div id="pdfModal" class="modal-pdf">
        <span class="close-pdf-btn" onclick="document.getElementById('pdfModal').style.display='none';">&times;</span>

        <div class="modal-content-pdf">
            <iframe id="pdfIframe" src="" type="application/pdf"
                style="width: 100%; height: 100%; border: none; display: block;">
            </iframe>
        </div>
    </div>
</div>