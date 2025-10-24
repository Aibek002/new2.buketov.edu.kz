<?php
use app\assets\SovetAsset;
use yii\helpers\Url;

SovetAsset::register($this);
$this->title = Yii::t("app", "Councils");
$lang = Yii::$app->language;

?>
<div class="m-5">
    <div class="title-page">
        <?= Yii::t("app", "Councils") ?>
    </div>
    <div class="select-section">
        <button id="loadSoleShareHolderBtn" data-lang="<?= $lang ?>"><?= Yii::t("app", "Ученый совет") ?>
        </button>
        <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Академический совет") ?>
        </button>
        <button id="loadGovernanceBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Научно-технический совет") ?>
        </button>
        <button id="loadSustainableDevelopmentBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Совет по этике") ?>
        </button>
    </div>
    <div class="uchenie-sovet active">
        <div class="title-content">
            <span> <?= Yii::t("app", "Academic Council") ?></span>

            <p class="text-content">
                <?= Yii::t("app", "The Academic Council is an elected collegial body.The Council is responsible for evaluating the implementation of the University's strategic objectives.The Board is headed by the Chairman of the Board, the Rector of the University.The Board consists of members of the Management Board, representatives of the faculty, administrative and managerial staff, students.The members of the Council are elected by secret ballot for a term of 3 years.The Council's work takes place in a meeting mode with a frequency of once a month.") ?>
            </p>
        </div>

        <div class="title-content">
            <span> <?= Yii::t("app", "Academic Secretary of the Council") ?></span>
            <div class="person-section my-5">
                <div class="person-img">
                    <img width="100%"
                        src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                        alt="">
                </div>
                <div class="person-info">
                    <p class="person-fio"> <?= Yii::t("app", "Tutinova Nurgul Yerkanatovna") ?> </p>

                    <p class="person-position">
                        <i><?= Yii::t("app", "Scientific Secretary of the Council") ?></i>
                    </p>

                    <p class="person-info">
                        <i>
                            <?= Yii::t("app", "Tutinova Nurgul Yerkanatovna is an Associate Professor of the Department of Philosophy and Theory of Culture, PhD, Scientific Secretary.") ?>
                        </i>
                    </p>
                </div>

                <div class="person-email">
                    <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7(777) -
                            777 - 77 - 77</a></div>
                    <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                            href="mailto:ucheniesovety@gmail.com">ucheniesovety@gmail.com</a></div>
                </div>
            </div>
        </div>
        <div class="title-content">
            <span><?= Yii::t("app", "Regulation on the Academic Council") ?></span>
            <p class="text-content">
                <?= Yii::t("app", "Report of the Chairman of the Board – Rector on the university's activities for the academic year and on the tasks for the upcoming academic year.") ?>
            </p>

            <?php
            $draft_decisions = [];
            $report = [];

            $other = [];


            ?>
            <?php foreach ($documents as $document_item): ?>
                <?php
                $parts = explode('/', $document_item->sort_id);
                if (reset($parts) === "Draft decisions of the Academic Council") {
                    $year = end($parts);
                    $draft_decisions[$year][] = $document_item;
                } elseif (reset($parts) === "Report of the Chairman of the Management Board") {
                    $year = end($parts);
                    $report[$year][] = $document_item;
                } else {
                    $other[$document_item->sort_id][] = $document_item;
                }

                ?>

            <?php endforeach; ?>
        </div>

        <div class=" title-content">
            <span> <?= Yii::t('app', 'Draft decisions of the Academic Council') ?></span>

            <div class="button-section">
                <?php foreach ($draft_decisions as $year => $item): ?>
                    <button onclick="openBoxDraft('<?= $year ?>')"><?= $year ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php foreach ($draft_decisions as $year => $item): ?>
            <div class="title-content draft-<?= $year ?>">
                <span> <?= Yii::t('app', 'Draft decisions of the Academic Council') . " - " . $year ?></span>
                <div class="button-section">
                    <?php foreach ($item as $item): ?>
                        <?php
                        $parts = explode("_", $item->fileName);
                        $file_name = end($parts);
                        ?>

                        <button
                            onclick="openCouncilPDF('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item->path_file) . $item->fileName ?>')"><?= $file_name ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="title-content">
            <span> <?= Yii::t("app", "Report of the Chairman of the Management Board") ?></span>

            <div class="button-section">
                <?php foreach ($report as $year => $item): ?>
                    <button onclick="openBoxReport('<?= $year ?>')"><?= $year ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php foreach ($report as $year => $item): ?>
            <div class="title-content report-<?= $year ?>">
                <span> <?= Yii::t('app', 'Report of the Chairman of the Management Board') . " - " . $year ?></span>
                <div class="button-section">
                    <?php foreach ($item as $item): ?>
                        <?php
                        $parts = explode("_", $item->fileName);
                        $file_name = end($parts);
                        ?>

                        <button
                            onclick="openCouncilPDF('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item->path_file) . $item->fileName ?>')"><?= $file_name ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php endforeach; ?>
        <div class="title-content">
            <span> <?= Yii::t("app", "Other documents"); ?></span>


            <div class="button-section">
                <?php foreach ($other as $key => $items): ?>
                    <?php foreach ($items as $doc): ?>
                        <?php
                        $parts = explode("_", $doc->fileName);
                        $file_name = end($parts);
                        ?>
                        <button
                            onclick="openCouncilPDF('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item->path_file) . $item->fileName ?>')">
                            <?= $file_name ?>
                        </button>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- <div class="select-section my-5">
        <button id="loadSoleShareHolderBtn"
            data-lang="<?= $lang ?>"><?= Yii::t("app", " Состав Совета на текущий год") ?>
        </button>
        <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", " План работы Совета на текущий год") ?>
        </button>
    </div> -->
        <div class="title-content">
            <span><?= Yii::t('app', 'Applicants for academic titles') ?> </span>
            <div class="button-section">
                <button onclick="redirect('<?= Url::to(['site/applicant-academic-titles']) ?>')">
                    <?= Yii::t('app', 'Open page') ?>
                </button>
            </div>
        </div>
    </div>

    <div class="academ-sovet">
        <div class="title-content">
            <span>Академический совет</span>
            <p class="text-content">
                Академический совет является коллегиальным органом, который уполномочен управлять
                Научно-методической
                деятельностью университета. В компетенцию Совета входит давать оценку качеству реализации
                образовательных
                программ, их методической обеспеченности.
                Академический совет включает академический комитет по вопросам методического обеспечения
                образовательного
                процесса, академический комитет по проектированию и экспертизе образовательных программ, Комиссию по
                оценке
                качества преподавания.
                В работе академических комитетов Академического совета принимают участие руководители подразделений,
                отвечающих за организацию процесса обучения, опытные преподаватели, представляющие факультеты,
                обучающиеся и
                работодатели. Возглавляет Совет член Правления по академическим вопросам-проректор.
                Члены Совета делегируются факультетами или входят в него по должности.
                Работа Совета проходит в режиме заседаний с периодичностью один раз в два месяца.
            </p>
        </div>
        <div class="select-section">
            <button><?= Yii::t('app', 'План работы Совета на текущий год') ?></button>
            <button><?= Yii::t('app', 'Состав Академического совета на текущий учебный год') ?></button>

        </div>
    </div>
    <div class="nauchno-sovet">
        <div class="title-content">
            <span>Научно-технический совет</span>
            <p class="text-content">
                Научно-технический совет является коллегиальным органом, который уполномочен управлять
                Научно-исследовательской деятельностью университета. В компетенцию Совета входит оценка реализации
                стратегической программы университета в области науки, экспертиза научных трудов ученых
                университета.
                В состав Совета входят заместители деканов по Научной работе факультетов, руководители НИИ
                университета,
                Управления послевузовского образования, Управления науки и коммерциализации, председатель Совета
                молодых
                ученых. Возглавляет Совет проректор по Научной работе. Члены Научно-технического совета делегируются
                факультетами или входят в него по должности.
                Работа Совета проходит в режиме заседаний с периодичностью не менее одного раза в месяц.

            </p>
        </div>
        <div class="select-section">
            <button><?= Yii::t('app', 'План работы Научно-технического совета на текущий год') ?></button>
            <button><?= Yii::t('app', 'Состав Научно-технического совета на текущий год') ?></button>

        </div>
    </div>
    <div class="sovet-etica">
        <div class="title-content">
            <span>Совет по этике</span>

            <p class="text-content">
                Совет по этике является консультативно-совещательным органом, рассматривающим вопросы трудовой
                дисциплины,
                соблюдения антикоррупционного законодательства, Кодекса корпоративной этики, Правил академической
                честности
                университета.
                Вы можете обратиться в Совет в случаях нарушения ваших академических, должностных, трудовых прав,
                возникновения конфликтных ситуаций в коллективе. Подать письменное обращение можно лично
                через Канцелярию
                университета, на корпоративный e-mail: office@ksu.kz или зайдя на сайт в раздел «Обратная
                связь» (Блог
                Председателя Правления-Ректора, Блог проректора по социально-культурному развитию).
                В состав Совета входят председатель профсоюзного союза университета, представители студенчества,
                руководитель Юридического управления, Управления персоналом и представители
                административно-управленческого
                персонала. Председателем Совета по этике является проректор по социально-культурному развитию.
                Состав Совета утверждается приказом председателя Правления-ректором университета.
                Совет созывается по мере необходимости.

            </p>
        </div>
        <div class="select-section">
            <button><?= Yii::t('app', 'Состав Совета на текущий год') ?></button>

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