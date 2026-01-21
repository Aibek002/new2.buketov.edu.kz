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
        <button id="loadSoleShareHolderBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Scientific Council") ?>
        </button>
        <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Academic Council") ?>
        </button>
        <button id="loadGovernanceBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Scientific and Technical Council") ?>
        </button>
        <button id="loadSustainableDevelopmentBtn" data-lang="<?= $lang ?>">
            <?= Yii::t("app", "Ethics Council") ?>
        </button>
    </div>

    <div class="uchenie-sovet active">
        <div class="title-content">
            <span> <?= Yii::t("app", "Scientific Council") ?></span>

            <p class="text-content">
                <?= Yii::t("app", "The Scientific Council is an elected collegial body.The Council is responsible for evaluating the implementation of the University's strategic objectives.The Board is headed by the Chairman of the Board, the Rector of the University.The Board consists of members of the Management Board, representatives of the faculty, administrative and managerial staff, students.The members of the Council are elected by secret ballot for a term of 3 years.The Council's work takes place in a meeting mode with a frequency of once a month.") ?>
            </p>
        </div>

        <div class="title-content">
            <span> <?= Yii::t("app", "Scientific Secretary of the Council") ?></span>
            <div class="person-section my-5">
                <div class="person-img">
                    <img width="100%"
                        src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                        alt="">
                    <div class="icon">
                        🎓
                    </div>
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
            <span><?= Yii::t("app", "Regulation on the Scientific Council") ?></span>
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
                if (reset($parts) === "Draft decisions of the Scientific Council") {
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
            <span> <?= Yii::t('app', 'Draft decisions of the Scientific Council') ?></span>

            <div class="button-section">
                <?php foreach ($draft_decisions as $year => $item): ?>
                    <button onclick="openBoxDraft('<?= $year ?>')"><?= $year ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php foreach ($draft_decisions as $year => $item): ?>
            <div class="title-content draft-<?= $year ?>">
                <span> <?= Yii::t('app', 'Draft decisions of the Scientific Council') . " - " . $year ?></span>
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
            <span><?= Yii::t('app', 'Academic Council') ?></span>
            <p class="text-content"><?= Yii::t('app', 'Academic Council text') ?></p>

        </div>
        <div class="select-section">
            <button
                onclick="document.getElementById('academic-council-plan-modal').style.display='flex';"><?= Yii::t('app', 'Work plan of the Council for the current year') ?></button>
            <button
                onclick="document.getElementById('academic-council-composition-modal').style.display='flex';"><?= Yii::t('app', 'Composition of the Academic Council for the current academic year') ?></button>
        </div>

    </div>
    <div class="nauchno-sovet">
        <div class="title-content">
            <span><?= Yii::t('app', 'Scientific and Technical Council') ?></span>

            <p class="text-content">
                <?= Yii::t('app', 'The Scientific and Technical Council is a collegial body authorized to manage the university\'s research activities. The Council is responsible for evaluating the implementation of the university\'s strategic program in science and for reviewing the scientific works of university researchers. The Council includes deputy deans for research of faculties, heads of university research institutes, the Postgraduate Education Department, the Science and Commercialization Department, and the chairman of the Council of Young Scientists. The Council is headed by the Vice-Rector for Research. Members of the Scientific and Technical Council are delegated by faculties or included by position. The Council meets at least once a month.') ?>
            </p>

        </div>
        <div class="select-section">
            <button
                onclick="document.getElementById('technical-council-plan-modal').style.display='flex';"><?= Yii::t('app', 'Work plan of the Council for the current year') ?></button>
            <button
                onclick="document.getElementById('technical-council-composition-modal').style.display='flex';"><?= Yii::t('app', 'Composition of the Academic Council for the current academic year') ?></button>
        </div>

    </div>
    <div class="sovet-etica">
        <div class="title-content">
            <span><?= Yii::t('app', 'Ethics Council') ?></span>

            <p class="text-content">
                <?= Yii::t('app', "The Ethics Council is an advisory body that considers issues of labor discipline, compliance with anti-corruption legislation, the Code of Corporate Ethics, and the University's Academic Integrity Rules. You can contact the Council in cases of violation of your academic, official, or labor rights, or in case of conflict situations in the team. A written appeal can be submitted personally through the University's Office, by corporate e-mail: office@ksu.kz, or via the website in the 'Feedback' section (Blog of the Chairman of the Board-Rector, Blog of the Vice-Rector for Social and Cultural Development). The Council includes the chairman of the university's trade union, representatives of students, the head of the Legal Department, the Human Resources Department, and representatives of administrative staff. The Chairman of the Ethics Council is the Vice-Rector for Social and Cultural Development. The composition of the Council is approved by the order of the Chairman of the Board-Rector of the university. The Council meets as needed.") ?>
            </p>

        </div>
        <div class="select-section">
            <button
                onclick="document.getElementById('ethics-council-modal').style.display='flex';"><?= Yii::t('app', 'Composition of the Council for the current year') ?></button>
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
<div id="ethics-council-modal" class="modal" style="background-color: rgba(0, 0, 0, 0.6);backdrop-filter: blur(5px);">

    <div class="modal-content" style="
                background-color: #ffffff;
                margin: auto;
                padding: 30px;
                border: 1px solid #888;
                width: 90%;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.5);
                animation-name: animatetop;
                animation-duration: 0.4s;
            ">

        <button class="close-btn" onclick="document.getElementById('ethics-council-modal').style.display='none';" style="
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
            <?= Yii::t("app", "Reception schedule for citizens") ?>
        </h2>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'Composition of the Council for the current year') ?>
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;">
            <li><?= Yii::t('app', 'Syzdykov M.Zh. – Member of the Board, Vice-Rector for Social and Cultural Development, Chairman of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Sagintayeva S.S. – Member of the Board, Vice-Rector for Academic Affairs, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Moldabayev A.S. – Member of the Board, Vice-Rector for Administrative and Economic Affairs, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Khasenova T.M. – Acting Director of the Department of Academic Affairs, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Toleubekov A.T. – Head of the Human Resources Department, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Oleynik V.I. – Head of the Anti-Corruption Compliance Service, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Baikenzhina Sh.T. – Head of the Legal Department, Member of the Council') ?></li>
            <li><?= Yii::t('app', 'Kassymov S.S. – Director of the Department of Science, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Zhunusova M.K. – Chair of the University Trade Union, Member of the Council') ?></li>
            <li><?= Yii::t('app', 'Rakhimov A.S. – Master’s student of the Faculty of Philosophy and Psychology, Member of the Council') ?>
            </li>
            <li><?= Yii::t('app', 'Zhumzhumayev N.S. – Legal Specialist of the Legal Department, Secretary of the Council') ?>
            </li>
        </ol>



    </div>
</div>
<div id="technical-council-composition-modal" class="modal"
    style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">
    <div class="modal-content" style="
      background-color: #ffffff;
      margin: auto;
      padding: 30px;
      border: 1px solid #888;
      width: 90%;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.5);
      animation-name: animatetop;
      animation-duration: 0.4s;
      height: 80%;
      overflow: scroll;
  ">
        <button class="close-btn"
            onclick="document.getElementById('technical-council-composition-modal').style.display='none';" style="
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
            <?= Yii::t('app', 'Состав Научно-технического совета на 2020–2021 учебный год') ?>
        </h2>

        <ol style="line-height: 1.8; margin-top: 15px;">
            <li><?= Yii::t('app', 'Тажбаев Е.М. – доктор химических наук, проректор по Научной работе, председатель Совета.') ?>
            </li>
            <li><?= Yii::t('app', 'Ранова Г.А. – магистр технических наук, секретарь Совета.') ?></li>
        </ol>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'Руководители подразделений науки и послевузовского образования:') ?>
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;" start="3">
            <li><?= Yii::t('app', 'Карстина С.Г. – доктор физико-математических наук, начальник Управления послевузовского образования.') ?>
            </li>
            <li><?= Yii::t('app', 'Касымов С.С. – кандидат физико-математических наук, начальник Управления науки и коммерциализации, заместитель председателя Совета.') ?>
            </li>
        </ol>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'Руководители НИИ:') ?>
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;" start="5">
            <li><?= Yii::t('app', 'Ишмуратова М.Ю. – кандидат биологических наук, профессор, руководитель Исследовательского парка биотехнологии и экомониторинга.') ?>
            </li>
            <li><?= Yii::t('app', 'Мамраева Д.Г. – кандидат экономических наук, директор Института исследований цифровой экономики.') ?>
            </li>
        </ol>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'Председатель Совета молодых ученых:') ?>
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;" start="7">
            <li><?= Yii::t('app', 'Камбарова Ж.Т. – доктор PhD, доцент кафедры физики и нанотехнологий.') ?></li>
        </ol>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'Заместители деканов по Научной работе факультетов:') ?>
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;" start="8">
            <li><?= Yii::t('app', 'Абугалиев Б.Н. – магистр педагогических наук, старший преподаватель факультета физической культуры и спорта.') ?>
            </li>
            <li><?= Yii::t('app', 'Аманжолова Б.А. – кандидат юридических наук, ассоциированный профессор юридического факультета.') ?>
            </li>
            <li><?= Yii::t('app', 'Балтабеков А.С. – кандидат физико-математических наук, доктор PhD, доцент физико-технического факультета.') ?>
            </li>
            <li><?= Yii::t('app', 'Демьянова Ю.А. – магистр гуманитарных наук, старший преподаватель филологического факультета.') ?>
            </li>
            <li><?= Yii::t('app', 'Жартай Ж.М. – доктор PhD экономического факультета.') ?></li>
            <li><?= Yii::t('app', 'Жумина А.Г. – доктор PhD, доцент биолого-географического факультета.') ?></li>
            <li><?= Yii::t('app', 'Ишанов П.З. – кандидат педагогических наук, доктор философии PhD, ассоциированный профессор педагогического факультета.') ?>
            </li>
            <li><?= Yii::t('app', 'Кохановер Т.А. – магистр педагогических наук, старший преподаватель факультета иностранных языков.') ?>
            </li>
            <li><?= Yii::t('app', 'Самойлова И.А. – магистр механики, старший преподаватель факультета математики и информационных технологий.') ?>
            </li>
            <li><?= Yii::t('app', 'Смагулов Н.Б. – магистр истории, старший преподаватель исторического факультета.') ?>
            </li>
            <li><?= Yii::t('app', 'Уксукбаева М.Т. – магистр социальной философии, старший преподаватель факультета философии и психологии.') ?>
            </li>
            <li><?= Yii::t('app', 'Хамитова Т.О. – доктор PhD химического факультета.') ?></li>
        </ol>
    </div>
</div>
<div id="technical-council-plan-modal" class="modal"
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
  ">
        <button class="close-btn"
            onclick="document.getElementById('technical-council-plan-modal').style.display='none';" style="
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
            <?= Yii::t('app', 'Work plan of the Council for the current year') ?>
        </h2>

        <div style="overflow-x:auto; margin-top: 20px;">
         <table style="width:100%; border-collapse: collapse; font-size: 15px;">
    <thead>
        <tr style="background-color: #1f3b6e; color: white;">
            <th style="padding: 10px; border: 1px solid #ccc;"><?= Yii::t('app', 'Meeting №') ?></th>
            <th style="padding: 10px; border: 1px solid #ccc;"><?= Yii::t('app', '№') ?></th>
            <th style="padding: 10px; border: 1px solid #ccc;"><?= Yii::t('app', 'Discussed issues') ?></th>
            <th style="padding: 10px; border: 1px solid #ccc;"><?= Yii::t('app', 'Month') ?></th>
            <th style="padding: 10px; border: 1px solid #ccc;"><?= Yii::t('app', 'Speakers') ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">1</td>
            <td>1.1</td>
            <td><?= Yii::t('app', 'Approval of the composition of the Scientific and Technical Council for the 2020–2021 academic year') ?></td>
            <td><?= Yii::t('app', 'August 2020') ?></td>
            <td><?= Yii::t('app', 'Chairperson of STC') ?></td>
        </tr>
        <tr>
            <td>1.2</td>
            <td><?= Yii::t('app', 'Approval of the work plan of the Scientific and Technical Council for the 2020–2021 academic year') ?></td>
            <td></td>
            <td><?= Yii::t('app', 'Chairperson of STC') ?></td>
        </tr>

        <tr>
            <td rowspan="2">2</td>
            <td>2.1</td>
            <td><?= Yii::t('app', 'Approval of the university plan for holding international and republican conferences in 2021') ?></td>
            <td><?= Yii::t('app', 'September 2020') ?></td>
            <td><?= Yii::t('app', 'Head of SRC') ?></td>
        </tr>
        <tr>
            <td>2.2</td>
            <td><?= Yii::t('app', 'Preparation for the conference dedicated to the 125th anniversary of N. Nurmakov and the 175th anniversary of A. Kunanbayev') ?></td>
            <td></td>
            <td><?= Yii::t('app', 'Vice-Rector for Socio-Cultural Development, Head of SRC, Deputy Deans') ?></td>
        </tr>

        <tr>
            <td rowspan="2">3</td>
            <td>3.1</td>
            <td><?= Yii::t('app', 'Conducting pedagogical research by faculties, including inclusive education') ?></td>
            <td><?= Yii::t('app', 'October 2020') ?></td>
            <td><?= Yii::t('app', 'Deputy Dean of Pedagogical Faculty') ?></td>
        </tr>
        <tr>
            <td>3.2</td>
            <td><?= Yii::t('app', 'Approval of topics of master’s and doctoral dissertations, supervisors, and commission members') ?></td>
            <td></td>
            <td><?= Yii::t('app', 'Head of DPE') ?></td>
        </tr>

        <tr>
            <td rowspan="2">4</td>
            <td>4.1</td>
            <td><?= Yii::t('app', 'Implementation of the work plan of the winners of the “Best University Teacher – 2019” grant') ?></td>
            <td><?= Yii::t('app', 'November 2020') ?></td>
            <td><?= Yii::t('app', 'Deputy Chairperson of STC') ?></td>
        </tr>
        <tr>
            <td>4.2</td>
            <td><?= Yii::t('app', 'Implementation of the university digitalization roadmap') ?></td>
            <td></td>
            <td><?= Yii::t('app', 'Deputy Deans for Research') ?></td>
        </tr>

        <tr>
            <td rowspan="2">5</td>
            <td>5.1</td>
            <td><?= Yii::t('app', 'State and development prospects of university scientific journals') ?></td>
            <td><?= Yii::t('app', 'December 2020') ?></td>
            <td><?= Yii::t('app', 'Commission') ?></td>
        </tr>
        <tr>
            <td>5.2</td>
            <td><?= Yii::t('app', 'Implementation of calendar plans for fundamental, applied, and contractual research topics') ?></td>
            <td></td>
            <td><?= Yii::t('app', 'Head of SRC, SRC Accountant') ?></td>
        </tr>
    </tbody>
</table>

        </div>
    </div>
</div>

<div id="academic-council-composition-modal" class="modal"
    style="background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(5px);">

    <div class="modal-content" style="
        background-color: #ffffff;
        margin: auto;
        padding: 30px;
        border: 1px solid #888;
        width: 90%;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        animation-name: animatetop;
        animation-duration: 0.4s;
    ">

        <button class="close-btn"
            onclick="document.getElementById('academic-council-composition-modal').style.display='none';" style="
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
            <?= Yii::t("app", "Composition of the Academic Council") ?>
            <!-- Академиялық Кеңестің құрамы -->
        </h2>

        <h3 style="color:#1f3b6e; margin-top:30px;">
            <?= Yii::t('app', 'The following composition of the Academic Council for the 2024–2025 academic year has been approved:') ?>
            <!-- 2024–2025 оқу жылына арналған Академиялық Кеңестің келесі құрамы бекітілсін: -->
        </h3>

        <ol style="line-height: 1.8; margin-top: 15px;">
            <li><?= Yii::t('app', 'M.M. Umurkuloва — Chairperson, Member of the Board for Academic Affairs – Vice-Rector') ?>
                <!-- М.М. Умуркулова — төраға, Академиялық мәселелер бойынша Басқарма мүшесі – проректор -->
            </li>
            <li><?= Yii::t('app', 'T.M. Khasenova — Director of the Department of Academic Affairs') ?>
                <!-- Т.М. Хасенова — Академиялық жұмыс департаментінің директоры -->
            </li>
            <li><?= Yii::t('app', 'S.V. Gagolina — Deputy Director of the Department of Academic Affairs, Candidate of Biological Sciences') ?>
                <!-- С.В. Гаголина — Академиялық жұмыс департаменті директорының орынбасары, б.ғ.к. -->
            </li>
            <li><?= Yii::t('app', 'S.L. Smailova — Deputy Director of the Department of Academic Affairs') ?>
                <!-- С.Л. Смаилова — Академиялық жұмыс департаменті директорының орынбасары -->
            </li>
            <li><?= Yii::t('app', 'M.S. Abisheva — Deputy Director of the Department of Academic Affairs, Candidate of Philological Sciences, PhD') ?>
                <!-- М.С. Әбишева — Академиялық жұмыс департаменті директорының орынбасары, фил.ғ.к., PhD -->
            </li>
            <li><?= Yii::t('app', 'G.Zh. Zhetimekova — Head of the Distance Education Center') ?>
                <!-- Г.Ж. Жетімекова — Қашықтықтан білім беру орталығының басшысы -->
            </li>
            <li><?= Yii::t('app', 'O.A. Tyan — Head of the Registrar’s Office, Candidate of Economic Sciences') ?>
                <!-- О.А. Тян — Тіркеуші кеңсе басшысы, э.ғ.к. -->
            </li>
            <li><?= Yii::t('app', 'G.Zh. Zhomartova — Chair of the Quality Assurance Commission of the Faculty of Biology and Geography, Senior Lecturer of the Department of Zoology') ?>
                <!-- Г.Ж. Жомартова — Биология-география факультетінің сапаны қамтамасыз ету жөніндегі комиссия төрағасы, зоология кафедрасының аға оқытушысы -->
            </li>
            <li><?= Yii::t('app', 'A.A. Palina — Chair of the Quality Assurance Commission of the Faculty of Foreign Languages, Assistant Professor of the Department of Theory and Methods of Foreign Language Training, PhD') ?>
                <!-- А.А. Палина — Шет тілдер факультетінің сапаны қамтамасыз ету жөніндегі комиссия төрағасы, шет тілдік дайындық теориясы мен әдістемесі кафедрасының профессор ассистенті, PhD -->
            </li>
            <li><?= Yii::t('app', 'A.Z. Zhumanova — Chair of the Quality Assurance Commission of the Faculty of History, Associate Professor of the Department of History of Kazakhstan and World History, PhD') ?>
                <!-- А.З. Жуманова — Тарих факультетінің сапаны қамтамасыз ету жөніндегі комиссия төрағасы, Қазақстан тарихы және ХХД кафедрасының қауымдастырылған профессоры, PhD -->
            </li>
            <li><?= Yii::t('app', 'U.A. Kosybaeva — Chair of the Quality Assurance Commission of the Faculty of Mathematics and Information Technologies, Candidate of Pedagogical Sciences') ?>
                <!-- У.А. Косыбаева — Математика және ақпараттық технологиялар факультетінің сапаны қамтамасыз ету жөніндегі комиссия төрағасы, п.ғ.к. -->
            </li>
        </ol>

    </div>
</div>
<div id="academic-council-plan-modal" class="modal"
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
        overflow: scroll;
    ">
        <button class="close-btn" onclick="document.getElementById('academic-council-plan-modal').style.display='none';"
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
            <?= Yii::t("app", "Plan of the Academic Council Meetings for 2024–2025") ?>
            <!-- 2024–2025 оқу жылына арналған Академиялық Кеңестің отырыстар жоспары -->
        </h2>

        <table border="1" cellpadding="8" cellspacing="0"
            style="width:100%; border-collapse: collapse; text-align:left;">
            <thead style="background-color:#f3f6fb;">
                <tr>
                    <th style="width:7%; text-align:center;">№</th>
                    <th style="width:42%;"><?= Yii::t('app', 'Agenda Items') ?></th>
                    <th style="width:18%; text-align:center;"><?= Yii::t('app', 'Date') ?></th>
                    <th style="width:33%;"><?= Yii::t('app', 'Responsible Persons') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center"><b>1.1</b></td>
                    <td><?= Yii::t('app', 'On the objectives and main directions of the Academic Council work for the 2024–2025 academic year') ?>
                    </td>
                    <td rowspan="4" align="center"><b><i><?= Yii::t('app', 'September') ?></i></b></td>
                    <td><?= Yii::t('app', 'Chairman of the Academic Council') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>1.2</b></td>
                    <td><?= Yii::t('app', 'On students’ academic performance results for the 2023–2024 academic year and the introduction of new approaches to student knowledge assessment') ?>
                    </td>
                    <td><?= Yii::t('app', 'Head of Registrar’s Office') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>1.3</b></td>
                    <td><?= Yii::t('app', 'On the results of the survey “Student satisfaction with the organization of the examination session”') ?>
                    </td>
                    <td><?= Yii::t('app', 'Head of Quality Assurance Department') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>1.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td align="center"><b>2.1</b></td>
                    <td><?= Yii::t('app', 'On planning and implementing activities for methodological support of young teachers') ?>
                    </td>
                    <td rowspan="4" align="center"><b><i><?= Yii::t('app', 'November') ?></i></b></td>
                    <td><?= Yii::t('app', 'Head of the Department of DiPPP') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>2.2</b></td>
                    <td><?= Yii::t('app', 'On the results of monitoring the quality of teaching and methodological materials implemented at the Faculty of Foreign Languages') ?>
                    </td>
                    <td><?= Yii::t('app', 'Chair of the Quality Assurance Commission of the Faculty of Foreign Languages') ?>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>2.3</b></td>
                    <td><?= Yii::t('app', 'Employer satisfaction with the quality of training of graduates of the Faculty of Biology and Geography') ?>
                    </td>
                    <td><?= Yii::t('app', 'Chair of the Quality Assurance Commission of the Faculty of Biology and Geography') ?>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>2.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td align="center"><b>3.1</b></td>
                    <td><?= Yii::t('app', 'On the results of the Teaching Quality Assurance Commission work in the 1st semester of the 2024–2025 academic year') ?>
                    </td>
                    <td rowspan="4" align="center"><b><i><?= Yii::t('app', 'December') ?></i></b></td>
                    <td><?= Yii::t('app', 'Head of the Commission') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>3.2</b></td>
                    <td><?= Yii::t('app', 'Analysis of the availability and content of educational video content for distance learning programs for 2024 by faculty') ?>
                    </td>
                    <td><?= Yii::t('app', 'Head of the Center for Distance Education') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>3.3</b></td>
                    <td><?= Yii::t('app', 'On the forms of cooperation between the departments of the Faculty of Philosophy and Psychology and employers, and the effectiveness of departmental branches') ?>
                    </td>
                    <td><?= Yii::t('app', 'Chair of the Quality Assurance Commission of the Faculty of Philosophy and Psychology') ?>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>3.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td align="center"><b>4.1</b></td>
                    <td><?= Yii::t('app', 'Analysis of the results of the winter examination session of the 2024–2025 academic year') ?>
                    </td>
                    <td rowspan="4" align="center"><b><i><?= Yii::t('app', 'February') ?></i></b></td>
                    <td><?= Yii::t('app', 'Head of Registrar’s Office') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>4.2</b></td>
                    <td><?= Yii::t('app', 'On the relevance and demand of bachelor’s, master’s, and doctoral programs') ?>
                    </td>
                    <td><?= Yii::t('app', 'Director of the Department for Academic Affairs') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>4.3</b></td>
                    <td><?= Yii::t('app', 'On the cooperation of the Faculty of Education with educational organizations of Karaganda: results and prospects') ?>
                    </td>
                    <td><?= Yii::t('app', 'Head of the Department of PIMNO') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>4.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td align="center"><b>5.1</b></td>
                    <td><?= Yii::t('app', 'Ensuring the educational process with electronic materials (lectures, multimedia presentations) for the 2024–2025 academic year') ?>
                    </td>
                    <td rowspan="2" align="center"><b><i><?= Yii::t('app', 'April') ?></i></b></td>
                    <td><?= Yii::t('app', 'Head of the Center for Distance Education') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>5.2</b></td>
                    <td><?= Yii::t('app', 'Analysis of the content of syllabi of economic disciplines') ?></td>
                    <td><?= Yii::t('app', 'Chair of the Quality Assurance Commission of the Faculty of Economics') ?>
                    </td>
                </tr>
                <tr>
                    <td align="center"><b>5.3</b></td>
                    <td><?= Yii::t('app', 'On the results of educational program accreditation') ?></td>
                    <td rowspan="2"></td>
                    <td><?= Yii::t('app', 'Head of Quality Assurance Department') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>5.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td align="center"><b>6.1</b></td>
                    <td><?= Yii::t('app', 'On the quality of organization and effectiveness of research practice for master’s students') ?>
                    </td>
                    <td rowspan="4" align="center"><b><i><?= Yii::t('app', 'June') ?></i></b></td>
                    <td><?= Yii::t('app', 'Head of Practice') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>6.2</b></td>
                    <td><?= Yii::t('app', 'On the results of the Teaching Quality Assurance Commission work in the 2nd semester of the 2024–2025 academic year') ?>
                    </td>
                    <td><?= Yii::t('app', 'Head of the Commission') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>6.3</b></td>
                    <td><?= Yii::t('app', 'On the implementation of the Academic Council decisions') ?></td>
                    <td><?= Yii::t('app', 'Commission') ?></td>
                </tr>
                <tr>
                    <td align="center"><b>6.4</b></td>
                    <td><?= Yii::t('app', 'Miscellaneous, including the results of the expertise of teaching and methodological literature by faculty') ?>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>