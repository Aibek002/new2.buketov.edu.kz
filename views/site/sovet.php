<?php
use app\assets\SovetAsset;
use yii\helpers\Url;

SovetAsset::register($this);
$this->title = Yii::t("app", "Sovet");
$lang = Yii::$app->language;

?>
<div class="m-5">
    <div class="title-page">
        <?= Yii::t("app", "Sovet") ?>
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
            <?= Yii::t("app", "Ученый совет") ?>
            <p class="text-content">
                Ученый совет является выборным коллегиальным органом.
                В компетенцию Совета входит давать оценку реализации стратегических задач университета.
                Возглавляет Совет председатель Правления-ректор университета.
                В состав Совета входят члены Правления, представители профессорско-преподавательского,
                административно-управленческого состава, студенчества.
                Члены Совета избираются путем тайного голосования сроком на 3 года.
                Работа Совета проходит в режиме заседаний с периодичностью один раз в месяц.
            </p>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Ученый секретарь Совета") ?>
            <div class="person-section my-5">
                <div class="person-img">
                    <img width="100%"
                        src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                        alt="">
                </div>
                <div class="person-info">
                    <p class="person-fio"> Тутинова Нургуль Ерканатовна</p>
                    <p class="person-position"><i>Ученый секретарь Совета</i></p>
                    <p class="person-info"><i>
                            Тутинова Нургуль Ерканатовна ассоциированный профессор кафедры философии и теории культуры,
                            доктор PhD, учёный секретарь</i></p>



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
            <?= Yii::t("app", "Положение об Ученом совете") ?>
            <p class="text-content">Отчет Председателя Правления – Ректора о деятельности университета за учебный год и
                о задачах на предстоящий учебный год.</p>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020-2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2021-2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2022-2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2023-2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2024-2025</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025-2026</button>


        </div>
        <div class="title-content">
            <?= Yii::t("app", "Проекты решений Ученого совета") ?>
        </div>
        <div class="button-section">
            <button onclick="loadPDF('/pdf/file1.pdf')">2020-2021</button>
            <button onclick="loadPDF('/pdf/file3.pdf')">2021-2022</button>
            <button onclick="loadPDF('/pdf/file4.pdf')">2022-2023</button>
            <button onclick="loadPDF('/pdf/file5.pdf')">2023-2024</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2024-2025</button>
            <button onclick="loadPDF('/pdf/file6.pdf')">2025-2026</button>


        </div>

        <div class="select-section my-5">
            <button id="loadSoleShareHolderBtn"
                data-lang="<?= $lang ?>"><?= Yii::t("app", " Состав Совета на текущий год") ?>
            </button>
            <button id="loadBoardOfDirectorsBtn" data-lang="<?= $lang ?>">
                <?= Yii::t("app", " План работы Совета на текущий год") ?>
            </button>
        </div>
        <div class="button-section">
          <button onclick="redirect('<?= Url::to(['site/applicant-academic-titles']) ?>')">
            <?= Yii::t('app','Applicants for academic titles')?>
          </button>
        </div>
    </div>

    <div class="academ-sovet">
        <p class="title-content">
            Академический совет
        </p>
        <p class="text-content">
            Академический совет является коллегиальным органом, который уполномочен управлять Научно-методической
            деятельностью университета. В компетенцию Совета входит давать оценку качеству реализации образовательных
            программ, их методической обеспеченности.
            Академический совет включает академический комитет по вопросам методического обеспечения образовательного
            процесса, академический комитет по проектированию и экспертизе образовательных программ, Комиссию по оценке
            качества преподавания.
            В работе академических комитетов Академического совета принимают участие руководители подразделений,
            отвечающих за организацию процесса обучения, опытные преподаватели, представляющие факультеты, обучающиеся и
            работодатели. Возглавляет Совет член Правления по академическим вопросам-проректор.
            Члены Совета делегируются факультетами или входят в него по должности.
            Работа Совета проходит в режиме заседаний с периодичностью один раз в два месяца.
        </p>

        <div class="select-section">
            <button><?= Yii::t('app', 'План работы Совета на текущий год') ?></button>
            <button><?= Yii::t('app', 'Состав Академического совета на текущий учебный год') ?></button>

        </div>
    </div>
    <div class="nauchno-sovet">
        <p class="title-content">
            Научно-технический совет
        </p>
        <p class="text-content">


            Научно-технический совет является коллегиальным органом, который уполномочен управлять
            Научно-исследовательской деятельностью университета. В компетенцию Совета входит оценка реализации
            стратегической программы университета в области науки, экспертиза научных трудов ученых университета.
            В состав Совета входят заместители деканов по Научной работе факультетов, руководители НИИ университета,
            Управления послевузовского образования, Управления науки и коммерциализации, председатель Совета молодых
            ученых. Возглавляет Совет проректор по Научной работе. Члены Научно-технического совета делегируются
            факультетами или входят в него по должности.
            Работа Совета проходит в режиме заседаний с периодичностью не менее одного раза в месяц.

        </p>

        <div class="select-section">
            <button><?= Yii::t('app', 'План работы Научно-технического совета на текущий год') ?></button>
            <button><?= Yii::t('app', 'Состав Научно-технического совета на текущий год') ?></button>

        </div>
    </div>
    <div class="sovet-etica">
        <p class="title-content">
            Совет по этике
        </p>
        <p class="text-content">




            Совет по этике является консультативно-совещательным органом, рассматривающим вопросы трудовой дисциплины,
            соблюдения антикоррупционного законодательства, Кодекса корпоративной этики, Правил академической честности
            университета.
            Вы можете обратиться в Совет в случаях нарушения ваших академических, должностных, трудовых прав,
            возникновения конфликтных ситуаций в коллективе. Подать письменное обращение можно лично через Канцелярию
            университета, на корпоративный e-mail: office@ksu.kz или зайдя на сайт в раздел «Обратная связь» (Блог
            Председателя Правления-Ректора, Блог проректора по социально-культурному развитию).
            В состав Совета входят председатель профсоюзного союза университета, представители студенчества,
            руководитель Юридического управления, Управления персоналом и представители административно-управленческого
            персонала. Председателем Совета по этике является проректор по социально-культурному развитию.
            Состав Совета утверждается приказом председателя Правления-ректором университета.
            Совет созывается по мере необходимости.

        </p>

        <div class="select-section">
            <button><?= Yii::t('app', 'Состав Совета на текущий год') ?></button>

        </div>
    </div>
</div>