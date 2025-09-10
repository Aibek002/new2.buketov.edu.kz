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
    <div class="title-content">
        Организует работу приёмной комиссии ответственный секретарь <div class="person-section my-5">
            <div class="person-img">
                <img width="100%"
                    src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                    alt="">
            </div>
            <div class="person-info">
                <p class="person-fio"> Барикова Алёна Рудольфовна. </p>
                <p class="person-position"><i>Организует работу приёмной комиссии ответственный секретарь </i></p>
                <p class="person-info"><i>


                        Абитуриенты могут обратиться в Приемную комиссию для получения консультации о правилах
                        поступления в университет, сроках и порядке подачи документов, прохождения подготовительных
                        курсов по дисциплинам ЕНТ. </i></p>



            </div>
            <div class="person-email">
                <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                        href="mailto:ucheniesovety@gmail.com">priemka@buketov.edu.kz</a></div>
                <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7 7212
                        90-02-70</a></div>
                <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7 7212
                        35-64-05</a></div>




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
            <?= Yii::t("app", "Bakalavriat") ?>
        </div>
        <div class="text-content">
            Это первый уровень университетского образования.

            Продолжительность обучения в бакалавриате может быть разной. Если абитуриент поступает в бакалавриат
            после
            средней школы, срок его обучения составит 4 года.

            Абитуриенты, окончившие колледж, могут обучаться 3 года.

            Для абитуриентов с высшим образованием срок обучения составит всего 2 года.

            Обязательное условие получения диплома - необходимо освоить не менее 240 кредитов.
            Обучение ведется сразу на двух языках: казахском и русском.
            <br><strong>
                Онлайн регистрация (регистрация актуальна в период приемной комиссии с 20.06 - 25.08)</strong><br>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Общие правила и сроки поступления") ?>
        </div>

        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 1): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                        <button
                            onclick="openGeneralRulesPdf('/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item['path'] ?>','bachelor')">
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 1): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                        <button
                            onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Форма для выбора профильных предметов и доступных профессий") ?>
        </div>

        <div class="p-5"
            style="width: 94vw; min-height: 100%; background: var(--indigoblue); border-radius:20px; border:1px solid var(--indigoblue-font); margin-block:50px">
            <h1 class="title-content">
                10 популярных профессий прошлого года (2024) в Казахстане (ориентируясь на данные по приёму в вузы)
            </h1>
            <ul type="1" class="popular-list">
                <li>6B01705 – Иностранный язык: два иностранных языка (английский) — 572</li>
                <li> 6B01403 – Физическая культура и спорт — 262</li>
                <li> 6B01701 – Казахский язык и литература — 209</li>
                <li>6B07201 – Технология фармацевтического производства — 192</li>
                <li>6B04201 – Юриспруденция — 164</li>
                <li> 6B01601 – История — 140</li>
                <li>6B06103 – Информационные системы — 133</li>
                <li>6B03106 – Психология — 110</li>
                <li> 6B05201 – Экология — 90 </li>
                <li>6B04204 – Судебная и прокурорская деятельность — 89</li>
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
                        Выбрать специальность по профильному предмету ЕНТ
                    </h1>
                    <select name="subject_id1" id="subject_id1" class="form-control mb-3">
                        <option value="">Выберите предмет 1</option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject->id ?>"><?= Html::encode($subject->{LanguageHelper::name()}) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="subject_id2" id="subject_id2" class="form-control mb-3">
                        <option value="">Выберите предмет 2</option>
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
                        Выбрать специальность в вузе

                    </h1>
                    <select name="profession" id="profession" class="form-control mb-3">
                        <option value="">Выберите спецальность вуза</option>
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
                        Выбрать специальность по спецальностьи колледжа
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
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 1): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 3): ?>

                        <button
                            onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Для поступающих на творческие и педагогические направления ") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 1): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 4): ?>

                        <button
                            onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>


        </div>

        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 1): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                        <button
                            onclick='openGeneralRulesPdf("/files/pdf/admission/bachelor/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>
        <div class="title-content">
            <div class="d-flex justify-content-center align-items-center flex-column">

                <?= Yii::t("app", "PDF") ?>

                <embed id="general-rules-pdf-bachelor" class="general-rules-pdf-bachelor" src="" width="50%"
                    height="600" type="application/pdf">
            </div>
        </div>
    </div>
    <div class="magistrant <?php echo ($type == 'magistracy') ? 'active' : ''; ?>">
        <div class="title-content">
            <?= Yii::t("app", "Magistrant") ?>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Общие правила и сроки поступления") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 2): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                        <button
                            onclick='openGeneralRulesPdfMagistr("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>

        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 2): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                        <button
                            onclick='openGeneralRulesPdfMagistr("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>

        <!--div class="title-content">
            <?= Yii::t("app", "Форма для выбора профильных предметов и доступных профессий") ?>
        </div>
        <div
            style="width: 94vw; height: 500px; background: var(--indigoblue); border-radius:20px; border:1px solid var(--indigoblue-font);">
        </div-->
        <div class="title-content">
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 2): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 3): ?>

                        <button
                            onclick='openGeneralRulesPdfMagistr("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>


        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 2): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                        <button
                            onclick='openGeneralRulesPdfMagistr("/files/pdf/admission/magistracy/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>
        <div class="title-content">
            <div class="d-flex justify-content-center align-items-center flex-column">

                <?= Yii::t("app", "PDF") ?>

                <embed id="general-rules-pdf-magistr" class="general-rules-pdf-magistr" src="" width="50%" height="600"
                    type="application/pdf">
            </div>
        </div>
    </div>
    <div class="doctorant <?php echo ($type == 'doctoral') ? 'active' : ''; ?>">
        <div class="title-content">
            <?= Yii::t("app", "Doctorant") ?>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Общие правила и сроки поступления") ?>
        </div>
        <div class="button-section">

            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 3): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 1): ?>

                        <button
                            onclick='openGeneralRulesPdfDoctoral("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>
        <div class="d-flex justify-content-center">
            <embed class="general-rules-pdf" src="" width="50%" height="600" type="application/pdf">
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 3): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 2): ?>

                        <button
                            onclick='openGeneralRulesPdfDoctoral("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>

        </div>


        <div class="title-content">
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 3): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 3): ?>

                        <button
                            onclick='openGeneralRulesPdfDoctoral("/files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>
        </div>


        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <?php foreach ($pdf as $pdf_item): ?>
                <?php if ($pdf_item['lang_pdf'] === $lang && $pdf_item['skill_level_id'] === 3): ?>

                    <?php if ($pdf_item['ref_sort_order_id'] === 5): ?>

                        <button
                            onclick='openGeneralRulesPdfDoctoral("files/pdf/admission/doctorant/<?= Yii::$app->language ?>/<?= $pdf_item["path"] ?>")'>
                            <?= $pdf_item["name_url"] ?>
                        </button>
                    <?php endif ?>
                <?php endif ?>

            <?php endforeach; ?>
        </div>
        <div class="title-content">
            <div class="d-flex justify-content-center align-items-center flex-column">

                <?= Yii::t("app", "PDF") ?>

                <embed id="general-rules-pdf-doctoral" class="general-rules-pdf-doctoral" src="" width="50%"
                    height="600" type="application/pdf">
            </div>
        </div>
    </div>

</div>