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
    <div class="select-container">
        <button id="loadSoleShareHolderBtn" data-lang="<?= $lang ?>"
            class="active"><?= Yii::t("app", "Decisions of the Sole Shareholder") ?></button>
        <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Board of Directors") ?></button>
        <button id="loadGovernanceBtn" data-lang="<?= $lang ?>"><?= Yii::t("app", "Governance") ?></button>
        <button id="loadDocumentsAndReportingBtn"
            data-lang="<?= $lang ?>"><?= Yii::t("app", "Corporate documents") ?></button>
        <button id="loadSustainableDevelopmentBtn"
            data-lang="<?= $lang ?>"><?= Yii::t("app", "Sustainable Development") ?></button>
    </div>

    <div class="container my-5 sole-shareholder p-0 active">

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
        <?php if (str_contains($pdf_item->sort_id, 'Комитет') && $pdf_item->language_file === Yii::$app->language): ?>
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
    $years = [];
    foreach ($pdf as $pdf_item) {
        if (str_contains($pdf_item->sort_id, 'Корпоративные события') && $pdf_item->language_file === Yii::$app->language) {
            $parts = explode('/', $pdf_item->sort_id);
            $year = end($parts);
            $years[$year][] = $pdf_item;
        }
    }

    // Сортируем года по убыванию
    krsort($years);
    ?>

    <div class="button-section">
        <?php foreach ($years as $year => $items): ?>
            <button onclick="openCorpEvent('<?= $year ?>')"><?= $year ?></button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($years as $year => $items): ?>
        <h2 class="title-content events year-<?= $year ?>-events"><?= Yii::t('app', 'Corporate events') ?> - <?= $year ?>
            <div class="button-section ">
                <?php foreach ($items as $item): ?>
                    <button onclick='openEvents(<?= json_encode($item->date) ?>, <?= json_encode($item->text) ?>)'>
                        <?= $item->date ?>
                    </button>

                <?php endforeach; ?>
            </div>
        </h2>
    <?php endforeach; ?>
    <div class="blur"></div>
    <div class="over"></div>
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
    <?php
    $meeting = [];

    foreach ($pdf as $pdf_item) {
        if (str_contains($pdf_item->sort_id, 'Заседание правления') && $pdf_item->ref_corporate_governance === 3 && $pdf_item->language_file === Yii::$app->language) {


            $parts = explode('/', $pdf_item->sort_id);
            $year = end($parts);
            $meeting[$year][] = $pdf_item; // массив, чтобы было несколько файлов
        }
    }

    // Кнопки по годам
    echo "<div class='button-section'>";
    foreach ($meeting as $year => $items) {
        echo "<button onclick='openGovMeetting($year)'>$year</button>";
    }
    echo "</div>";
    // Вывод файлов по годам
    foreach ($meeting as $year => $items) {

        echo "<div class='title-content gov_met year-" . $year . "'>" . Yii::t('app', 'Composition of the Governance ') . ' - ' . $year;
        echo '<div class="button-section">';
        foreach ($items as $item) {
            $path = $item->path_file . '/' . $item->fileName;

            echo "<button onclick=\"openGovMetByYear('$path')\">{$item->name_url}</button>";
        }
        echo "</div></div>";
    }


    ?>
    <div class="text-center">
        <embed class="governance_pdf border rounded mt-4" src="" width="80%" height="600" type="application/pdf">
    </div>

</div>

<div class="sustainable_development">
    <div class="title-content">
        <?= Yii::t("app", "Sustainable Development") ?>
    </div>

    <div class="container">


        <div class="sustdev-content-wrapper">
            <div class="sustdev-left-content">
                <h5>
                    Е.А. Букетов атындағы университеттің Тұрақты даму мақсаттарына қосқан үлесі
                </h5>
                <p>
                    2016 жылдың 1 қаңтарынан бастап Біріккен Ұлттар Ұйымының (БҰҰ) барлық мүше мемлекеттері 2030 жылға
                    дейінгі Тұрақты даму саласындағы күн тәртібін ресми түрде жүзеге асыруға кірісті — бұл жаһандық
                    өзекті мәселелерді шешуге бағытталған 17 Тұрақты даму мақсатына (ТДМ) негізделген өзгерістер
                    жоспары.
                    Университеттер – білім мен инновация орталығы ретінде – БҰҰ қабылдаған ТДМ-ға қол жеткізуде маңызды
                    рөл атқарады. Университеттердің ТДМ-ды ілгерілетуге қосатын үлесі көп қырлы және тұрақты дамудың
                    барлық аспектілерін қамтиды — климаттың өзгеруімен күресуден бастап сапалы білім беруді қамтамасыз
                    етуге, теңсіздікті азайту мен инклюзивті қоғам құруға дейін.
                    Академик Е.А. Букетов атындағы Қарағанды университеті БҰҰ Бас Ассамблеясы тұжырымдаған 17 өзара
                    байланысты мақсаттың ішінен университеттің миссиясына, көзқарасына және стратегиясына, сондай-ақ
                    оның білім беру, ғылыми және әлеуметтік рөліне сәйкес келетін алты басым Тұрақты даму мақсатын
                    айқындады:
                    <br>1. Барлық жастағы адамдар үшін салауатты өмір салтын қамтамасыз ету және әл-ауқатты ілгерілету
                    (ЦУР 3);
                    <br>2. Баршаға өмір бойы сапалы және қолжетімді білім беру (ЦУР 4);
                    <br>3. Гендерлік теңдікті қамтамасыз ету және барлық әйелдер мен қыздардың құқықтары мен
                    мүмкіндіктерін кеңейту (ЦУР 5);
                    <br>4. Арзан, сенімді және тұрақты энергия көздеріне қолжетімділікті қамтамасыз ету (ЦУР 7);
                    <br>5. Тұрақты инфрақұрылымды құру, индустрияландыру мен инновацияларды қолдау (ЦУР 9);
                    <br>6. Тұрақты даму мақсаттарына қол жеткізу құралдары мен жаһандық әріптестікті нығайту (ЦУР 17);

                </p>

            </div>

            <div class="sustdev-right-content">

                <button class="sustdev-toggle-button">
                    <h5>Тұрақты даму құжаттары</h5> <span class="sustdev-span">+</span>
                </button>
                <div class="sustdev-slide-box">

                    <div class="sustdev-documents">
                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/Политика устойчивого развития_kz.pdf">Тұрақты
                            даму саясаты</a>
                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/теңдік. әртүрілік инклюзивтілік саясаты.pdf">Теңдік
                            пен инклюзивтілік саясаты</a>
                        <a href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/Орнықты инвестициялау саясаты.pdf">Тұрақты
                            инвестициялау саясаты</a>
                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/Орнықты сатып алу саласындағы саясаты.pdf">Тұрақты
                            сатып алулар саласындағы саясат</a>
                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/АКт раздела границ балансовой принадлежности.pdf">Балансқа
                            тиесілі шекараларды бөлу актісі</a>

                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/Взаимодействие со стейкхолдерами_рус.pdf">Стейкхолдерлермен
                            өзара әрекеттестік</a>
                        <a href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/Данные для рейтинга QS.pdf">QS
                            рейтингі үшін мәліметтер</a>
                        <a
                            href="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/План мероприятий по устойчивому развитию 2025, 2026 гг._каз.pdf">2025-2026
                            жылдарға арналған тұрақты даму іс-шаралар жоспары</a>

                    </div>

                    <img src="https://up.buketov.edu.kz/info/kor_upr/ust_razvitie/коллаж.jpg"
                        alt="Тұрақты даму құжаттары">

                </div>
            </div>

        </div>

        <script async="" src="https://c.zero.kz/z.js"></script>
        <script>
            function toggleGoal(goalId) {
                var content = document.getElementById('goal' + goalId);
                var span = content.previousElementSibling.querySelector('.sustdev-span');

                if (content.style.display === 'none' || content.style.display === '') {
                    content.style.display = 'block';
                    span.textContent = '−';
                } else {
                    content.style.display = 'none';
                    span.textContent = '+';
                }
            }
        </script>

        <h5 style="
    font-size:35px;
       text-align: center;
    background: linear-gradient(135deg, #eaf3ff, #f5faff);
    padding: 40px 20px;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0, 74, 173, 0.1);
    ">
            Тұрақты даму саласындағы 17 мақсат

        </h5>
    </div>

    <div class="flex-sdg-card">
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-1-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal1"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-2-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal2"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-3-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal3"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-4-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal15"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-5-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal4"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-6-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal5"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-7-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal6"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-8-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal7"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-9-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal8"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-10-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal9"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-11-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal10"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-12-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal11"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-13-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal12"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-14-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal13"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-15-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal14"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-16-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal16"></div>
        <div class="sdg-card" style="
    background: url(https://satbayev.university/files/img/university/sdg/goals/sdg-17-kz.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;" data-target="modal17"></div>
        <div id="modal1" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p><strong>1-ші мақсат: Кедейлікті жою</strong></p>
                <p>
                    Кедейліктің барлық түрлерін жою адамзаттың ең маңызды мәселелерінің бірі болып қала береді.
                    1990 жылдан 2015 жылға дейін кедейшілікте өмір сүрген адамдардың саны 36%-дан 10%-ға дейін азайды.
                    Дегенмен,
                    әлем халқының 10%-ы, яғни 700 миллион адам әлі де негізгі қажеттіліктерге қол жеткізе алмай,
                    кедейшілікте өмір
                    сүріп жатыр, мысалы денсаулық сақтау, білім алу, су және санитарлық жағдайлар.
                    <br><br>
                    Ауылдық жерлерде кедейлік деңгейі қалаларға қарағанда 3 есе жоғары. Жұмыс орнында болу лайықты өмір
                    сүру
                    деңгейін кепілдемейді: 2018 жылы әлемдегі жұмыс істейтін халықтың 8%-ы және олардың отбасылары
                    кедейлікте
                    өмір сүрді.
                    Әр бесінші бала кедейлікте өмір сүріп жатыр. Әлеуметтік қорғаудың мықты жүйесі барлық балалар мен
                    осал топтар үшін кедейлікті азайтуда маңызды рөл атқарады.
                </p>
            </div>
        </div>

        <div id="modal2" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p><strong>2-ші мақсат: Аштықты жою</strong></p>
                <p>
                    Десятилетия бойы азайып келген аштықтың саны 2015 жылы қайта өсіп бастады. Қазіргі уақытта әлемде
                    690 миллион
                    адам аштықтан зардап шегуде (әлем халқының 8,9%), бұл өткен жылмен салыстырғанда 10 миллионға көп,
                    ал бес жыл
                    бұрын 60 миллионға артық болды. Егер қазіргі тенденция сақталса, 2030 жылға қарай аштықтан зардап
                    шеккендер
                    саны 840 миллионнан асуы мүмкін.
                    <br><br>
                    Аштықтың негізгі себептері: қақтығыстар, климаттың өзгеруі және экономикалық дағдарыс. 250 миллионға
                    жуық адам
                    аштық шегу қаупінде. Әлемдік азық-түлік жүйесін қайта құру, азық-түлік пен гуманитарлық көмек
                    көрсету және
                    тұрақты ауыл шаруашылығын дамыту қажет.
                </p>
            </div>
        </div>

        <div id="modal3" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p><strong>3-ші мақсат: Дені сау өмір салты және әл-ауқат</strong></p>
                <p>
                    Әр жас кезеңіндегі денсаулық пен әл-ауқатты қамтамасыз ету — тұрақты дамудың маңызды бөлігі.
                    Соңғы жылдары елеулі жетістіктерге жетілді: СПИД-тен өлім-жітім 2010 жылдан бері 52%-ға азайып, 47
                    елде
                    бір немесе бірнеше ұмытылған тропикалық аурулар жойылды.
                    <br><br>
                    Бірақ медициналық қызметтерге қол жетімділік бойынша теңсіздік сақталып отыр. COVID-19 пандемиясы
                    мен басқа
                    да дағдарыстар прогресті тоқтатты: вакцинация деңгейі төмендеп, туберкулез бен безгектен өлім-жітім
                    артты.
                    Барлық адамдар үшін медициналық қызметтерге қол жеткізу, қауіпсіз және арзан дәрі-дәрмектер мен
                    вакциналарға
                    қол жеткізу, сондай-ақ СПИД, туберкулез және басқа да жұқпалы ауруларды 2030 жылға дейін жою бойынша
                    кешенді
                    шаралар қабылдануы қажет.
                </p>
            </div>
        </div>

        <!-- 4-ші мақсат: Сапалы білім -->
        <div id="modal15" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>4-ші мақсат: САПАЛЫ БІЛІМ</p>
                <p>
                    Білім әлеуметтік-экономикалық жағдайды жақсартуда және адамдарды кедейліктен шығару үшін маңызды рөл
                    атқарады.
                    Соңғы онжылдықта білімге қол жеткізуде елеулі жетістіктерге жетілді, әсіресе қыздарға білім беру
                    саласында.
                    Дегенмен, 2018 жылы шамамен 260 миллион бала мектепке бармады, ал балалар мен жасөспірімдердің
                    жартысынан көбі
                    оқу мен математиканың минималды стандарттарына сәйкес келмеді.
                    <br><br>
                    2020 жылы COVID-19 пандемиясы көптеген елдерде мектептерді жапты, бұл 91%-дан астам оқушыға әсер
                    етті. Бұл
                    1,6 миллиард бала мен жасөспірімді оқыту орындарынан тыс қалдырды, 369 миллион бала күнделікті
                    тамақтануды
                    мектептің тағамынан алатындықтан, олар басқа тамақ көздерін іздеуге мәжбүр болды.
                    <br><br>
                    Барлық адамдар үшін білімге қол жеткізу мен өмір бойы оқу мүмкіндігін ынталандыру үшін тегін және
                    міндетті
                    білім беру енгізу, мұғалімдер санын арттыру, мектеп инфрақұрылымын жақсарту және цифрлық
                    трансформацияны енгізу
                    қажет.
                </p>
            </div>
        </div>

        <!-- 5-ші мақсат: Гендерлік теңдік -->
        <div id="modal4" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>5-ші мақсат: ГЕНДЕРЛІК ТЕҢДІК</p>
                <p>
                    Гендерлік теңдік — бейбітшілік, гүлдену және тұрақты даму үшін қажетті негіз. Соңғы онжылдықта
                    елеулі жетістіктерге
                    жетілді: балалар некеқұру саны азайып, қыздар білім алып, әйелдер басшылық қызметтерге көбірек
                    қатыса бастады,
                    заңдарды реформалау гендерлік теңдікті қамтамасыз етуге бағытталды.
                    <br><br>
                    Алайда көптеген мәселелер әлі де шешілмеген: дискриминациялық заңдар, саясаттағы әйелдердің аз
                    өкілдігі және
                    зорлық-зомбылық деңгейінің жоғары болуы. COVID-19 пандемиясы гендерлік теңсіздікті арттырды, әйелдер
                    мен
                    қыздар үшін денсаулық сақтау, экономика және қауіпсіздік мәселелерін күрделендірді.
                    <br><br>
                    Гендерлік теңдікті ілгерілету қоғамның барлық аспектілерінде маңызды: кедейлікті азайтудан бастап,
                    денсаулықты,
                    білімді, қорғауды және әл-ауқатты нығайтуға дейін.
                </p>
            </div>
        </div>

        <!-- Цель 6: Чистая вода и санитария -->
        <div id="modal5" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>МАҚСАТ 6: СУ РЕСУРСТАРЫ ЖӘНЕ САНИТАРИЯ</p>
                <p>
                    Маңызды жетістіктерге қарамастан, миллиардтаған адамдар, негізінен ауылдық аймақтарда, таза су мен
                    санитарияға қол жеткізе алмай келеді. Әлемде әр үшінші адам қауіпсіз ауыз суына қол жеткізе алмайды,
                    ал әр бесінші адам қол жуу үшін сабынмен жағдайға ие емес.
                    <br><br>
                    COVID-19 пандемиясы аурулардың алдын алуда таза су мен гигиеналық жағдайлардың маңызды рөлін
                    көрсетті. Қол жуу инфекциялардың алдын алудың ең тиімді әдістерінің бірі болды. Қауіпсіз суға,
                    санитария мен гигиеналық жағдайға қол жеткізу – бұл адамның денсаулығы мен әл-ауқатын сақтау үшін ең
                    негізгі қажеттілік.
                    <br><br>
                    2030 жылға қарай миллиардтаған адамдар бұл негізгі қызметтерден айрылуы мүмкін, себебі суға деген
                    сұраныс халықтың өсуі, урбанизация және ауыл шаруашылығы, өнеркәсіп пен энергетика саласындағы суға
                    деген қажеттіліктердің артуына байланысты өсіп отыр. Климаттың өзгеруі нәтижесінде жаһандық
                    температуралардың жоғарылауына байланысты су тапшылығы күшейе түсуі болжануда.
                    <br><br>
                    Қауіпсіз әрі арзан ауыз суына барлығының қол жеткізуін қамтамасыз ету үшін негізгі шаралар –
                    инфрақұрылым мен санитарлық құрылысқа инвестициялар, су экожүйелерін қорғау және қалпына келтіру,
                    санитарлық білім беру және су пайдалану тиімділігін арттыру.
                </p>
            </div>
        </div>

        <!-- Цель 7: Доступная и чистая энергия -->
        <div id="modal6" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>МАҚСАТ 7: ҚОЛЖЕТІМДІ ЖӘНЕ ТАЗА ЭНЕРГИЯ</p>
                <p>
                    Әлемде электр энергиясына және тұрақты энергияға қол жеткізуді қамтамасыз ету бағытында прогресс
                    байқалады, энергия тиімділігі жақсарып, жаңартылатын энергия көздері бойынша нәтижелерге қол жеткен.
                    Сонымен қатар, әлемде электр энергиясына деген тұтыну деңгейі тез өсіп келеді. Сондықтан тұрақты
                    электрмен жабдықтаудың болмауы елдерге өз экономикасын дамытуға кедергі келтіреді.
                    <br><br>
                    2030 жылға дейін барлық адамдарға арзан электр энергиясына қол жеткізуді қамтамасыз ету үшін
                    экологиялық таза энергия көздеріне, мысалы, күн, жел және жылу энергиясына инвестициялар қажет.
                    Инфрақұрылымды кеңейту және экологиялық таза энергиямен қамтамасыз ету үшін дамушы елдердегі
                    технологияларды модернизациялау – бұл маңызды мақсат, ол экономикалық өсуге ықпал ете отырып,
                    қоршаған ортаны қорғауға да көмектеседі.
                </p>
            </div>
        </div>

        <!-- Цель 8: Достойная работа и экономический рост -->
        <div id="modal7" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>МАҚСАТ 8: ҚҰРМЕТТІ ЖҰМЫС ЖӘНЕ ЭКОНОМИКАЛЫҚ ӨСУ</p>
                <p>
                    Тұрақты және инклюзивті экономикалық өсу прогреске қол жеткізуге, барлық адамдар үшін құрметті жұмыс
                    орындарын құруға және өмір деңгейін жақсартуға ықпал етеді. COVID-19 пандемиясы рекордтық
                    жұмыссыздық деңгейіне әкеліп, ең кедей халық топтарын қатты зардап шекті.
                    <br><br>
                    Кедейлікті жою тек тұрақты және жақсы төленетін жұмыс орындары болғанда ғана мүмкін болады. Әлемдік
                    деңгейде жұмысқа қабілетті халық санының өсуін қамту үшін жыл сайын 30 млн жаңа жұмыс орнын құру
                    қажет.
                    <br><br>
                    2022 жылы әлемде жұмыссыздық деңгейі айтарлықтай төмендеп, 2020 жылдағы ең жоғары деңгейден 5,4
                    пайызға дейін төмендеді, өйткені экономика COVID-19 пандемиясынан кейін қалпына келе бастады.
                    Дегенмен, тұрақты және инклюзивті экономикалық өсу үшін еңбек нарығында жастарды жұмысқа орналастыру
                    мүмкіндіктерін кеңейту, бейресми жұмысты азайту және еңбек нарығындағы теңсіздікті (әсіресе,
                    жалақыдағы жыныстық теңсіздікті) жою, жұмыс орнында қауіпсіз және сенімді жағдайлар жасау, сондай-ақ
                    қаржылық қызметтерге қол жеткізуді арттыру қажет.
                </p>
            </div>
        </div>

        <!-- Цель 9: Индустриализация, инновации и инфраструктура -->
        <div id="modal8" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>МАҚСАТ 9: ИНДУСТРИАЛАНДЫРУ, ИННОВАЦИЯЛАР ЖӘНЕ ИНФРАҚҰРЫЛЫМ</p>
                <p>
                    Экономикалық өсу, әлеуметтік даму және климаттың өзгеруімен күресу негізінен инфрақұрылымға, тұрақты
                    өнеркәсіптік дамуға және технологиялық прогреске инвестициялардан тәуелді. Жаһандық экономикалық
                    жағдайдың жылдам өзгеруі мен теңсіздіктің артуына байланысты тұрақты өсу индустриаландыруды қамтуы
                    тиіс, ол, біріншіден, барлық адамдар үшін мүмкіндіктер жасау, ал екіншіден, инновациялар мен тұрақты
                    инфрақұрылым арқылы қолдау табуы керек.
                    <br><br>
                    Көптеген дамушы елдерде әлі де негізгі инфрақұрылым жоқ, мысалы, жолдар, ақпараттық-коммуникациялық
                    технологиялар, санитария, электр энергиясы және сумен жабдықтау.
                    <br><br>
                    Индустриаландыру инновациялар мен инфрақұрылыммен бірге жаңа технологияларды енгізу мен дамыту,
                    халықаралық сауданы қолдау және ресурстарды тиімді пайдалану үшін маңызды рөл атқарады, сондай-ақ
                    ұзақ мерзімді экономикалық және экологиялық мәселелердің шешімдерін табу үшін, мысалы, ресурстарды
                    тиімді пайдалану мен энергия тиімділігін арттыру.
                </p>
            </div>
        </div>

        <!-- Цель 10: Сокращение неравенства -->
        <div id="modal9" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>МАҚСАТ 10: ТЕҢСІЗДІКТІ ҚЫСҚАРТУ</p>
                <p>
                    Елдер ішіндегі және олар арасындағы теңсіздікті азайту тұрақты даму мақсаттарына жетуде маңызды рөл
                    атқарады. Кейбір салаларда, мысалы, кейбір елдерде табыс теңсіздігінің салыстырмалы түрде азаюы мен
                    төмен табысты елдерге сауда артықшылықтарының берілуі сияқты оң нәтижелер байқалса да, теңсіздік әлі
                    де сақталып отыр. COVID-19 пандемиясы соңғы 30 жылдағы елдер арасындағы теңсіздіктің ең үлкен өсуіне
                    әкелді. Сонымен қатар, әлеуметтік, саяси және экономикалық теңсіздік пандемияның әсерін күшейтті.
                    Теңсіздікті азайту үшін ресурстарды әділ бөлу, білім мен дағдыларды дамытуға инвестициялар,
                    әлеуметтік қорғау шараларын жүзеге асыру, кемсітушілікпен күресу, маргинализацияланған топтарды
                    қолдау және әділ сауда мен қаржылық жүйелерде халықаралық ынтымақтастықты нығайту қажет.
                </p>
            </div>
        </div>
        <!-- Мақсат 11: Тұрақты қалалар мен қоныстар -->
        <div id="modal10" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>ТҰРАҚТЫ ҚАЛАЛАР МЕН ҚОНЫСТАР</p>
                <p>
                    Әлем халқының жартысынан көбі қалаларда тұрады, ал болжам бойынша 2050 жылға қарай бұл көрсеткіш 70
                    пайызға дейін артады. Алайда, көптеген қалалар жылдам урбанизацияға дайын емес, бұл тұрғын үй,
                    инфрақұрылым және қызметтерді дамыту қарқынынан асып кетеді, соның салдарынан трущобалар немесе
                    трущобаларға ұқсас жағдайлар көбейеді. Қазіргі уақытта 1,1 миллиард адам трущобаларда немесе
                    трущобаларға ұқсас жағдайларда тұрады, ал тағы 2 миллиард адам келесі 30 жылда пайда болуы мүмкін.
                    Сонымен қатар, қалалар мен мегаполистер экономикалық өсу орталықтары болып табылады, олар әлемдік
                    ЖІӨ-нің шамамен 60% қамтамасыз етеді. Алайда, олар сонымен бірге әлемдік көміртек шығарындыларының
                    75%-ын және энергия тұтынудың 60-80%-ын құрайды. Көптеген қалалар климаттың өзгеруіне және табиғи
                    апаттарға жоғары тәуекелге ие, сондықтан қалалардың өмір сүру қабілеттілігін арттыру адамдардың,
                    әлеуметтік және экономикалық шығындарды болдырмау үшін өте маңызды.
                </p>
            </div>
        </div>

        <!-- Мақсат 12: Жауапты тұтыну және өндіріс -->
        <div id="modal11" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>ЖАУАПТЫ ТҰТЫНУ ЖӘНЕ ӨНДІРІС</p>
                <p>
                    Әлем бойынша тұтыну мен өндіріс табиғат ресурстарын пайдалану негізінде құрылған, бірақ ол планетаға
                    апатты әсерін тигізуде. Соңғы ғасырда қол жеткен әлеуметтік-экономикалық прогресс қоршаған ортаның
                    нашарлауына әкелді. Сонымен қатар, планетаның ресурстары таусылып барады. Егер 2050 жылға қарай
                    планета халқы 9,8 миллиард адамға жетсе, қазіргі өмір салтын қолдау үшін қажетті табиғи ресурстар
                    үшін үш планетаның эквиваленті қажет болады. Тұрақты тұтыну мен өндіріс «көп нәрсені, бірақ аз
                    ресурспен» жасауға бағытталған. Сонымен қатар, ол экономикалық өсумен қоршаған ортаның нашарлауы
                    арасындағы тікелей тәуелділікті жоюға, ресурстарды тиімді пайдалануды арттыруға және тұрақты өмір
                    салтын ынталандыруға бағытталған. Тұрақты тұтыну мен өндіріс кедейлікті азайтуға және төмен
                    көміртекті, «жасыл» экономиканы құруға маңызды үлес қосуы мүмкін.
                </p>
            </div>
        </div>

        <!-- Мақсат 13: Климаттың өзгеруімен күрес -->
        <div id="modal12" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>КЛИМАТТЫҢ ӨЗГЕРУІМЕН КҮРЕС</p>
                <p>
                    Климаттың өзгеруі барлық елдерге әсер етеді. Оның салдары қиратушы болуы мүмкін және бұл экстрималды
                    және өзгермелі ауа райы жағдайлары мен теңіз деңгейінің көтерілуін қамтиды. Климаттың өзгеруі
                    азық-түлік және су тапшылығы сияқты бар проблемаларды күшейтеді, бұл қақтығыстарға алып келуі
                    мүмкін. Сонымен қатар, климаттың өзгеруі адам әрекеті арқылы айтарлықтай ұлғайды. Жасыл үйкөшелердің
                    көбеюі климаттың өзгеруін жылдамдатады. 2010-2020 жылдар аралығында жоғары осалдық деңгейі бар
                    аймақтарда (3,3-3,6 миллиард адам тұрады) су тасқыны, құрғақшылық және дауылдардан болатын өлім
                    деңгейі өте төмен осалдық деңгейі бар аймақтармен салыстырғанда 15 есе жоғары болды. Елдер COVID-19
                    пандемиясынан кейін экономиканы қалпына келтіріп жатқан кезде, қалпына келтіру жоспарлары XXI
                    ғасырдағы экономиканы таза, «жасыл», денсаулыққа зиянсыз, қауіпсіз және тұрақты етіп жасауға
                    мүмкіндік береді.
                </p>
            </div>
        </div>

        <!-- Мақсат 14: Теңіз экожүйелерін қорғау -->
        <div id="modal13" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>СУ АСТЫНДАҒЫ ӨМІР</p>
                <p>
                    Мұхит ғаламдық жүйелерді басқарады, олар Жерді адамзат өмірі үшін қолайлы етеді. Мұхит пен теңіз
                    экожүйелері азық-түлік, дәрі-дәрмектер, биожанармай және басқа да өнімдер сияқты негізгі табиғи
                    ресурстарды қамтамасыз етеді; қалдықтар мен ластануды жоюға көмектеседі; ал олардың жағалаудағы
                    экожүйелері дауылдардың әсерін азайтуға көмектеседі. Олар сондай-ақ планетаның ең ірі көміртек
                    жинаушысы болып табылады. Алайда қазіргі уақытта жағалаудағы судың жағдайы үнемі нашарлап келеді,
                    2021 жылы мұхит 17 миллион метрлік тоннадан астам қоқыспен ластанады, ал 2040 жылға қарай бұл
                    көрсеткіш екі немесе үш есе артуы мүмкін. Пластик — мұхиттың ластануында ең зиянды түрі. Мұхиттың
                    қышқылдануы экожүйелердің жұмыс істеуіне және биологиялық әртүрлілікке теріс әсер етеді. Осы маңызды
                    ғаламдық ресурсты тиімді пайдалану мен сақтау тұрақты болашақтың негізі болып табылады. Мұхиттарды
                    сау күйде сақтау климаттың өзгеруімен күресу және оған бейімделу шараларының тиімділігін арттырады.
                    Сонымен қатар, қорғалатын теңіз аймақтары балық аулау көлемін және кіріс деңгейін арттырып,
                    денсаулыққа жағымды әсер ету арқылы кедейлік деңгейін төмендетуге ықпал етеді.
                </p>
            </div>
        </div>

        <!-- Мақсат 15: Жер экожүйелерін қорғау -->
        <div id="modal14" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>ЖЕРДЕГІ ӨМІР</p>
                <p>
                    Табиғат адам өмірі үшін шешуші маңызға ие. Алайда, адам әрекеті планетаның экожүйелеріне теріс
                    әсерін тигізуде. 2019 жылғы Биоәртүрлілік және экожүйелік қызметтер туралы жаһандық есепке сәйкес, 1
                    миллионнан астам жануарлар мен өсімдіктер түрі жоғалу қаупінде, және олардың көпшілігі жақын жылдары
                    жойылып кетуі мүмкін. Адам әрекеті және климаттың өзгеруі салдарынан ормандардың кесілуі мен
                    шөлейттену тұрақты даму жолында елеулі кедергілер болып табылады және миллиондаған адамдардың
                    өміріне және тіршілігіне әсер етеді. Ауыл шаруашылығының кеңеюі ормандарды кесудің негізгі себебі
                    болып табылады. Сонымен қатар, Жер экожүйелері адамның өмір сүруі үшін өте маңызды, олар әлемдік
                    ЖІӨ-нің жартысынан көбін қамтамасыз етеді және әртүрлі мәдени, рухани және экономикалық
                    құндылықтарды қамтиды. Жер экожүйелерін қорғау мен қалпына келтіру, орман ресурстарын тиімді
                    пайдалану, шөлейттенумен күрес, жер деградациясының тоқтатылуы және биоәртүрлілікті жоғалту процесін
                    тоқтату адамзаттың өмірі үшін шешуші маңызы бар.
                </p>
            </div>
        </div>

        <!-- Мақсат 16: Тыныштық, әділеттілік және тиімді институттар -->
        <div id="modal16" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>ТЫНЫШТЫҚ, ӘДІЛЕТТІЛІК ЖӘНЕ ТИІМДІ ИНСТИТУТТАР</p>
                <p>
                    Тұрақты даму үшін бейбіт және ашық қоғам құру, барлық үшін әділеттілікті қамтамасыз ету және барлық
                    деңгейде тиімді, есеп беретін және кең ауқымды қатысу негізіндегі институттарды құру қажет. Әлемнің
                    әр түрлі елдерінде адамдар зорлық-зомбылықтың барлық түрлерінен қауіпсіз болуға және өз өмірін
                    қорықпай өткізуге құқылы. Бірақ әлем бойынша үнемі және жаңа қатаң қақтығыстар, қауіпсіздіктің
                    болмауы, билік институттарының әлсіздігі мен әділеттілікке қол жетімділіктің шектеулілігі әлемдік
                    бейбітшілік пен мақсат 16-ға жету жолын бұзады. Тыныштық, әділеттілік және ашықтыққа қол жеткізу
                    үшін үкіметтер, азаматтық қоғам және қауымдастықтар ұзақ мерзімді шешімдер қабылдау үшін бірлесіп
                    жұмыс істеуі қажет, олар зорлық-зомбылықты, әділеттілікті, жемқорлықпен күресуді азайтуға және
                    барлық кезеңдерде толық қатысуды қамтамасыз етуге бағытталған.
                </p>
            </div>
        </div>

        <!-- Мақсат 17: Тұрақты даму мақсаттарына қол жеткізу үшін серіктестік -->
        <div id="modal17" class="modal-overlay">
            <div class="modal-content">
                <span class="modal-close" id="closeModalBtn">×</span>
                <p>ТҰРАҚТЫ ДАМУ МАҚСАТТАРЫНА ҚОЛ ЖЕТКІЗУ ҮШІН СЕРІКТЕСТІК</p>
                <p>
                    Тұрақты даму мақсаттарын табысты жүзеге асыру үшін ғаламдық, аймақтық және жергілікті деңгейлерде
                    қамтушы серіктестік қатынастарын орнату қажет, олар ортақ көзқарастар мен мақсаттарға негізделген,
                    адамдар мен планетаның мүдделерін қанағаттандыруға бағытталған. Көпжақты серіктестіктер тұрақты даму
                    мақсаттары арасында өзара байланыстарды оңтайландыру үшін маңызды, олардың тиімділігін және
                    нәтижелілігін арттыру, сондай-ақ осы мақсаттарға қол жеткізуді жеделдету үшін. Техникалық даму,
                    қаржы ресурстарын тарту және әлеуетті арттыруға қатысты бар ресурстарды тарту қажет. Геосаяси
                    шиеленіс және ұлттық қозғалыстар халықаралық ынтымақтастық пен үйлестіруге кедергі келтіреді, бұл
                    дамушы елдерге қажетті қаржы мен технологияларды беру үшін ұжымдық әрекеттің маңыздылығын көрсетеді.
                </p>
            </div>
        </div>
        `
    </div>
    <br><br>
    <h5 style="
    
    font-size:35px;
       text-align: center;
    background: linear-gradient(135deg, #eaf3ff, #f5faff);
    padding: 40px 20px;
    margin :0 0 40px ;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0, 74, 173, 0.1);
    ">
        Құрметті студенттер, сіздер үшін күн сайын 32 тегін спорт секциясы жұмыс істейді.<br>
        Толығырақ ақпаратты мына <a style="text-decoration: underline;"
            href="https://www.instagram.com/reel/DHZM8zJOXzS/?igsh=ZGV1Y3lnaHRyNGtj">сілтеме</a> арқылы ала аласыздар.
    </h5>
    <div class="d-flex justify-content-center align-items-center" style="
    background: linear-gradient(135deg, #eaf3ff, #f5faff);
    padding: 40px 20px;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0, 74, 173, 0.1);
    margin: 0 0 40px;">
        <iframe style="border-radius:20px;" width="90%" height="600px"
            src="https://www.youtube.com/embed/G4hF5eL8nTA?si=xgVH1Z8AvH9BTjs2" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
    </div><br><br>
    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Әлеуметтік бағытталған университет </h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Университетте салауатты өмір салтын дамытуға қолайлы және қолдаушы орта құру, студенттер мен
                        қызметкерлердің денсаулығына назар аудару, дене белсенділігі мәдениетін қалыптастыру.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/7.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/8.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/9.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/10.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/11.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/12.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/social/13.jpg" alt="">
        </div>
    </div>

    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Инклюзивті университет</h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Білім беру мүмкіндіктеріне тең қолжетімділікті қамтамасыз ету, әлеуметтік кедергілерді еңсеруге
                        көмектесу және барлық топтарды университет өміріне тарту.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/7.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/8.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/inclusive/9.jpg" alt="">
        </div>
    </div>
    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Күміс университет</h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Барлық мүдделі тараптар үшін біліктілікті арттыру және қосымша білім беру бойынша сапалы
                        бағдарламаларға тең қолжетімділікті қамтамасыз ету.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/kumis/7.jpg" alt="">

        </div>
    </div>
    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Толерантты университет</h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Гендерлік білімді университеттің білім беру және ғылыми жүйесіне енгізу, гендерлік әртүрлілікке
                        төзімді көзқарас қалыптастыру бойынша жұмысты күшейту.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/7.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/8.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/tolentai/9.jpg" alt="">

        </div>
    </div>

    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Жасыл университет</h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Университетте энергия үнемдейтін технологиялар мен заманауи жаңартылатын энергия көздерін
                        енгізуге қолайлы орта құру.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/7.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/8.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/9.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/10.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/11.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/12.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/13.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/14.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/15.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/green/16.jpg" alt="">
        </div>
    </div>
    <div class="custom-box">
        <div class="top-section">
            <div class="title-and-photos">
                <h2>Зерттеу университеті</h2>
                <div class="description">
                    <p>
                        <b>Мақсат:</b><br>
                        Инновациялық әзірлемелер үшін тиімді экожүйе құру.
                    </p>
                </div>
            </div>
            <div class="three-photos">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/1.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/2.jpg" alt="">
                <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/3.jpg" alt="">
            </div>
        </div>
        <hr>
        <div class="gallery-grid">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/4.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/5.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/6.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/7.jpg" alt="">
            <img src="https://buketov.edu.kz/content/_page/kz/corporate/isl/8.jpg" alt="">

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.querySelector('.sustdev-toggle-button');
            const sustdevDocuments = document.querySelector('.sustdev-documents');
            const toggleBtnGoal = document.querySelector('#goalsBtn');
            const flexsdgcard = document.querySelector('.flex-sdg-card');

            // Переключение блока документов
            if (toggleBtn && sustdevDocuments) {
                toggleBtn.addEventListener('click', () => {
                    if (sustdevDocuments.style.display === 'none' || sustdevDocuments.style.display === '') {
                        sustdevDocuments.style.display = 'flex';
                    } else {
                        sustdevDocuments.style.display = 'none';
                    }
                });
            }

            // Переключение блока целей
            if (toggleBtnGoal && flexsdgcard) {
                toggleBtnGoal.addEventListener('click', () => {
                    if (flexsdgcard.style.display === 'none' || flexsdgcard.style.display === '') {
                        flexsdgcard.style.display = 'flex';
                    } else {
                        flexsdgcard.style.display = 'none';
                    }
                });
            }

            // Открытие модального окна по клику на карточку
            document.querySelectorAll('.sdg-card').forEach(card => {
                card.addEventListener('click', () => {
                    const modalId = card.getAttribute('data-target');
                    const modal = document.getElementById(modalId);
                    if (modal) modal.classList.add('active');
                });
            });

            // Закрытие по крестику
            document.querySelectorAll('.modal-close').forEach(closeBtn => {
                closeBtn.addEventListener('click', () => {
                    const modal = closeBtn.closest('.modal-overlay');
                    if (modal) modal.classList.remove('active');
                });
            });

            // Закрытие при клике вне модального контента
            window.addEventListener('click', e => {
                if (e.target.classList.contains('modal-overlay')) {
                    e.target.classList.remove('active');
                }
            });
        });
    </script>


</div>
<div class="DocumentsAndReporting">

    <!-- <div class="content-corporate-documents"> -->
    <?php
    $corp_docs = [];
    foreach ($pdf as $pdf_item) {
        if ($pdf_item->ref_corporate_governance === 4 && $pdf_item->language_file === Yii::$app->language) {
            $parts = explode('/', $pdf_item->sort_id);
            $section = reset($parts);
            $corp_docs[$section][] = $pdf_item;
        }

    }

    ?>




    <?php

    foreach ($corp_docs as $section => $items) {
        echo '   <h3 class="title-content">' . $section . "</h3>";
        echo '<div class="button-section">';
        foreach ($items as $item) {
            $path = htmlspecialchars($item->path_file . $item->fileName, ENT_QUOTES);
            echo "<button onclick=\"pdfViewerCorpDocs('$path')\">{$item->name_url}</button>";

        }
        echo '</div>';
    }
    ?>

    <!-- <button onclick="loadPDF('/pdf/file1.pdf')"><?= Yii::t('app', 'Corporate documents') ?></button>
        <button onclick="loadPDF('/pdf/file2.pdf')"><?= Yii::t('app', 'Annual reports of the Company') ?></button>
        <button onclick="loadPDF('/pdf/file3.pdf')"><?= Yii::t('app', 'Annual financial statements') ?></button> -->
    <br>
    <div class="text-center">
        <embed class="corp_docs_pdf border rounded mt-4" src="" width="80%" height="600" type="application/pdf">
    </div>

    <!-- </div> -->
</div>
</div>


</>