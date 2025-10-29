<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use \yii\helpers\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
// Подключение шрифта IBM Plex Mono через Google Fonts
$this->registerCssFile('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&display=swap', ['rel' => 'stylesheet']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('https://kz.h-index.com/web/uploads/images/mMZp7e.png')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Bootstrap 5 CSS -->

</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <?php if (Yii::$app->user->isGuest || Yii::$app->controller->id == 'site'): ?>
        <header id="header">
            <div class="navbar navbar-expand-md fixed-top  p-3 header">
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                    <?= Html::img('/bg-images/logo-buketov.png', [
                        'alt' => 'Buketov Logo',
                        'class' => 'navbar-logo logoBuketov',
                        'style' => 'height: 60px;' // Установите нужную высоту
                    ]) ?>
                </a>
                <ul class="navbar-nav ms-auto text-white px-5">
                    <li class="nav-item d-flex align-items-center lang-switcher">
                        <?= Html::a('kz', Url::current(['lang' => 'kz']), ['class' => 'lang-link']) ?>
                        <?= Html::a('ru', Url::current(['lang' => 'ru']), ['class' => 'lang-link']) ?>
                        <?= Html::a('en', Url::current(['lang' => 'en']), ['class' => 'lang-link']) ?>

                        <!-- <a href="<?= \yii\helpers\Url::current(['lang' => 'kk']) ?>">Қазақша</a> |
                    <a href="<?= \yii\helpers\Url::current(['lang' => 'ru']) ?>">Русский</a> |
                    <a href="<?= \yii\helpers\Url::current(['lang' => 'en']) ?>">English</a> -->


                        <button class="dropdown-toggle-header">
                            <img src="/bg-images/svg/toOpen.svg" alt="Menu Icon">
                        </button>
                        <div class="dropdown-menu-header">
                            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><img width="200px"
                                    src="/bg-images/bg-first-block-half1.png"> </a>
                            <div class="d-flex g-2 my-5 dropdown-main-flex">
                                <div class="dropdown-main-menu">
                                    <!-- <p class="type-person">Пожалуйста, выберите, кем вы являетесь:</p>-->
                                    <?= Html::a(Yii::t('app', 'Buketov University'), ['site/index'], ['class' => 'menu-item']) ?>

                                    <button id="menu-for-about-us"><?= Yii::t('app', 'About Us') ?> <span>+</span></button>
                                    <button id="menu-for-incoming"><?= Yii::t('app', 'Applicants') ?>
                                        <span>+</span></button>
                                    <button id="menu-for-student"><?= Yii::t('app', 'Students') ?> <span>+</span></button>
                                    <button id="menu-for-faculties"><?= Yii::t('app', 'Faculties') ?>
                                        <span>+</span></button>
                                    <!--button id="menu-for-graduation"><?= Yii::t('app', 'Graduates') ?> <span>+</span></button-->
                                    <button id="menu-for-science"><?= Yii::t('app', 'Science') ?> <span>+</span></button>
                                    <button
                                        id="menu-for-international-cooperation"><?= Yii::t('app', 'International Cooperation') ?>
                                        <span>+</span></button>

                                    <?= Html::a(Yii::t('app', 'Vacancies') . ' <span>></span>', ['site/vacancy'], ['class' => 'menu-item']) ?>
                                    <?= Html::a(Yii::t('app', 'Contacts') . ' <span>></span>', ['site/contact'], ['class' => 'menu-item']) ?>


                                </div>
                                <div class="dropdown-submenus">
                                    <div class="dropdown-submenu university-info">
                                        <?= Html::a(
                                            Yii::t('app', 'History of the University') . ' <span>></span>',
                                            ['site/article', 'ref_article_id' => '1'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Mission of the University') . ' <span>></span>',
                                            ['site/article', 'ref_article_id' => '2'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Development Program') . ' <span>></span>',
                                            ['site/article', 'ref_article_id' => '5'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'We are in the Rankings') . ' <span>></span>',
                                            ['site/article', 'ref_article_id' => 3, 'ref_image_id' => 10],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Corporate Governance') . ' <span>></span>',
                                            ['site/corparate'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Administrative Services') . "1" . ' <span>></span>',
                                            ['site/management-structure', 'type' => 'administrative-services'],
                                            ['class' => 'menu-item']
                                        ) ?>
                                        <?= Html::a(
                                            Yii::t('app', 'Administrative Services') . "2" . ' <span>></span>',
                                            ['site/management-structure-ex', 'type' => 'administrative-services'],
                                            ['class' => 'menu-item']
                                        ) ?>
                                        <?= Html::a(
                                            Yii::t('app', 'Councils') . ' <span>></span>',
                                            ['site/sovet'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Accreditation Certificate') . ' <span>></span>',
                                            ['site/img'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                    </div>
                                    <div class="dropdown-submenu incoming">
                                        <?= Html::a(
                                            Yii::t('app', 'Bachelor') . ' <span>></span>',
                                            ['site/admission', 'type' => 'bachelor'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Master\'s Degree') . ' <span>></span>',
                                            ['site/admission', 'type' => 'magistracy'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Doctoral Studies') . ' <span>></span>',
                                            ['site/admission', 'type' => 'doctoral'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(Yii::t('app', 'Education of International Students') . ' <span>></span>', ['site/international-students'], ['class' => 'menu-item']) ?>


                                        <?= Html::a(
                                            Yii::t('app', 'Student Dormitory Information') . ' <span>></span>',
                                            ['site/article', 'type' => 'information-about-the-student-house', 'title' => '"House of Students" complex'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Contacts') . ' <span>></span>',
                                            ['site/contact'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                    </div>
                                    <div class="dropdown-submenu student">
                                        <!-- <?= Html::a(Yii::t('app', 'Campus Life') . ' <span>></span>', '#', [
                                            'class' => 'menu-item'
                                        ]) ?> -->
                                        <?= Html::a(Yii::t('app', 'Education of International Students') . ' <span>></span>', ['site/international-students'], ['class' => 'menu-item']) ?>

                                        <?= Html::a(Yii::t('app', 'Library') . ' <span>></span>', 'https://library.buketov.edu.kz/', [
                                            'class' => 'menu-item',
                                            'encode' => false,
                                            'target' => '_blank', // открывать в новой вкладке
                                        ]) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Military Department') . ' <span>></span>',
                                            ['site/faculty', 'name' => 'Военная кафедра'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(Yii::t('app', 'Career Center') . ' <span>></span>', '#', [
                                            'class' => 'menu-item'
                                        ]) ?>

                                        <?= Html::a(Yii::t('app', 'Contacts') . ' <span>></span>', ['site/contact'], [
                                            'class' => 'menu-item'
                                        ]) ?>

                                    </div>

                                    <div class="dropdown-submenu faculties">
                                        <?= Html::a(Yii::t('app', 'Faculty of Biology and Geography') . ' <span>></span>', ['site/faculty', 'name' => 'биолого-географический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of History') . ' <span>></span>', ['site/faculty', 'name' => 'исторический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Foreign Languages') . ' <span>></span>', ['site/faculty', 'name' => 'иностранных языков'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Mathematics and IT') . ' <span>></span>', ['site/faculty', 'name' => 'математики и информационных технологий'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Education') . ' <span>></span>', ['site/faculty', 'name' => 'педагогический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Physics and Technology') . ' <span>></span>', ['site/faculty', 'name' => 'физико-технический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Physical Education and Sport') . ' <span>></span>', ['site/faculty', 'name' => 'физической культуры и спорта'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Philology') . ' <span>></span>', ['site/faculty', 'name' => 'филологический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Philosophy and Psychology') . ' <span>></span>', ['site/faculty', 'name' => 'философии и психологии'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Chemistry') . ' <span>></span>', ['site/faculty', 'name' => 'химический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Economics') . ' <span>></span>', ['site/faculty', 'name' => 'экономический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Law') . ' <span>></span>', ['site/faculty', 'name' => 'юридический'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Faculty of Continuing Education') . ' <span>></span>', ['site/faculty', 'name' => 'факультет дополнительного образования'], ['class' => 'menu-item']) ?>


                                    </div>
                                    <div class="dropdown-submenu graduate">
                                        <a href="#" class="menu-item">Известные выпускники <span>></span></a>
                                        <a href="#" class="menu-item">Endowment fund <span>></span></a>
                                        <a href="#" class="menu-item">Контакты <span>></span></a>
                                    </div>
                                    <div class="dropdown-submenu science">
                                        <button class="menu-item researchCenterBtn">
                                            <?= Yii::t('app', 'Research Centers') ?><span>+</span>
                                        </button>
                                        <button class="menu-item DissertationCouncilBtn">
                                            <?= Yii::t('app', 'Dissertation Councils') ?><span>+</span>
                                        </button>
                                        <button class="menu-item CompetitionsAndGrantsBtn">
                                            <?= Yii::t('app', 'Scientific Competitions and Grants') ?><span>+</span>
                                        </button>
                                        <button class="menu-item ConferencesBtn">
                                            <?= Yii::t('app', 'Scientific Conferences and Events') ?><span>+</span>
                                        </button>
                                        <button class="menu-item ResearchJobStudentBtn">
                                            <?= Yii::t('app', 'Department of Student Research Work') ?><span>+</span>
                                        </button>

                                        <?= Html::a(Yii::t('app', 'Scientific Journals and Publications') . ' <span>></span>', 'https://vestnik.buketov.edu.kz/', [
                                            'class' => 'menu-item',
                                            'target' => '_blank',
                                            'encode' => false,
                                        ]) ?>

                                    </div>
                                    <div class="dropdown-submenu international-cooperation">
                                        <?= Html::a(Yii::t('app', 'Academic Mobility') . ' <span>></span>', ['site/academic-mobility'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Education of International Students') . ' <span>></span>', ['site/international-students'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'International Conferences and Seminars') . ' <span>></span>', ['site/conferences-and-seminar'], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Membership in International Organizations') . ' <span>></span>', ['site/intl-org-membership'], ['class' => 'menu-item']) ?>

                                        <!--a href="#" class="menu-item">Международные проекты и научные исследования<span>></span></a-->
                                        <!--a href="#" class="menu-item">Международные конференции и семинары<span>></span></a-->
                                        <!--a href="#" class="menu-item">Университеты-партнеры <span>></span></a-->
                                        <!--a href="#" class="menu-item">Программа приглашения зарубежных
                                            ученых<span>></span></a-->

                                        <!--a href="#" class="menu-item">Членство в международных
                                            организациях<span>></span></a-->


                                    </div>
                                </div>
                                <div class="dropdown-menu-social">
                                    <p><?= Yii::t('app', 'We are on social networks') ?></p>

                                    <div class="researchCenter">
                                        <?= Html::a(Yii::t('app', 'Institute of Molecular Nanophotonics') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Institute of Molecular Nanophotonics'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Center for Nanotechnology and Nanomaterials') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Scientific Center "Nanotechnology and functional nanomaterials"'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Institute of Chemical Problems') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Scientific-Research Institute of Chemical Issues'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Center of Applied Chemistry') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => '"Applied Chemistry" scientific-research center'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Laboratory of Physico-Chemical Research') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Laboratory of engineering profile "Physic-chemical methods of research"'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Biotechnology Research Park') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Biotechnology and Eco-Monitoring Research Park'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Laboratory of Applied Mechanics and Robotics') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Research Laboratory "Applied Mechanics and Robotics"'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Institute of Digital Economy') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Institute of digital economy research'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Institute of Law and State Studies') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Scientific-research institute of legal research and state studies'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Institute of Spiritual Heritage') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Institute for the Study of the Spiritual Heritage of the Kazakh People'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Institute of Applied Mathematics') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Institute of Applied Mathematics'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Laboratory of Religious Situation in Kazakhstan') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Research Laboratory of the Comprehensive Study of the Religious Situation in Kazakhstan'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Saryarka Archaeological Institute') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Saryarka Archaeological Institute'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Tulgatanu Research Center') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => '"Tulgatanu" Scientific research center'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Center for Ethno-Anthropological Research') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Center of Еthnocultural and Historical-Anthropological Research'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Laboratory of Language Education') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Scientific-research laboratory on the problems of language education'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Center for Inclusive Education') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Resource Center for Inclusive and Special Education'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Socio-Psychological Laboratory') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Socio-psychological research laboratory'], ['class' => 'menu-item', 'encode' => false]) ?>
                                        <?= Html::a(Yii::t('app', 'Laboratory of Organic Semiconductor Chemistry') . ' <span>></span>', ['site/article', 'ref_article_id' => '6', 'title' => 'Scientific laboratory  of organic semiconductor chemistry'], ['class' => 'menu-item', 'encode' => false]) ?>


                                    </div>
                                    <div class="DissertationCouncil">
                                        <?= Html::a(Yii::t('app', 'Law') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 1], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'History') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 2], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Mathematics') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 3], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Physics') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 4], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Pedagogy and primary education methods') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 5], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Pedagogy and psychology') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 6], ['class' => 'menu-item']) ?>

                                        <?= Html::a(Yii::t('app', 'Kazakh language and literature') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 7], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Biology') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 8], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Chemistry') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 9], ['class' => 'menu-item']) ?>

                                        <?= Html::a(Yii::t('app', 'Foreign languages') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 10], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Economics') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 11], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Philology') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 12], ['class' => 'menu-item']) ?>
                                        <?= Html::a(Yii::t('app', 'Thermophysics and theoretical heat engineering') . ' <span>></span>', ['site/dissertation-advice', 'dissertation_id' => 13], ['class' => 'menu-item']) ?>

                                    </div>
                                    <div class="CompetitionsAndGrands">
                                        <?= Html::a(
                                            Yii::t('app', 'Scientific works competition - Law and civil society') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конкурс', 'url' => 'Международный конкурс научных робот'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Regulations on the competition') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конкурс', 'url' => 'положение'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                    </div>
                                    <div class="Conferences">
                                        <?= Html::a(
                                            Yii::t('app', 'Conference Calendar') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конференция', 'url' => 'Календарь конференций'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Buketov Readings – 2025') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конференция', 'url' => 'Букетовские чтения-2025'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Buketov Readings – 2024') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конференция', 'url' => 'Букетовские чтения-2024'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', '125 years of K. Satpayev - International Conference') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конференция', 'url' => 'Сборник конф-и Сатпаева'],
                                            ['class' => 'menu-item']
                                        ) ?>

                                        <?= Html::a(
                                            Yii::t('app', 'Modern problems of legal science') . ' <span>></span>',
                                            ['site/open-general-pdf', 'path' => '/files/pdf/Science/Конференция', 'url' => 'Современные проблемы правовой науки'],
                                            ['class' => 'menu-item']
                                        ) ?>
                                    </div>
                                    <div class="ResearchJobStudent">
                                        <button class="menu-item year-toggle-btn--2025">2024–2025 <span>+</span></button>
                                        <div class="ResearchJobStudent-2025">
                                            <?= Html::a(
                                                Yii::t('app', '(6В11401) Social Work') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6В11405 (6В11401) Социальная работа'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В07201) Pharmaceutical Production Technology') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6В07201 Технология фармацевтического производства'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В05302) Fundamental Chemistry') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6В05302 Фундаментальная  химия'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В02303) Foreign Philology') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6В02310 (6В02303) Иностранная филология'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В02201) Philosophy') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6В02201 Философия'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6B03202) Public Relations') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2024-2025', 'url' => 'Протокол по ОП 6B03202 Связь с общественностью'],
                                                ['class' => 'menu-item']
                                            ) ?>


                                        </div>

                                        <button class="menu-item year-toggle-btn--2024">2023–2024 <span>+</span></button>
                                        <div class="ResearchJobStudent-2024">
                                            <?= Html::a(
                                                Yii::t('app', '(6В07201) PPhT') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В07201 ТФП'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В06205) RET') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В06205 РЭТ'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В05302) Fundamental Chemistry') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В05302 Фунд Химия'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В05301) Chemistry') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В05301 Химия'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В02203) Archaeology') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В02203 Археология'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В01410) World Economy') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В01410 Мировая экономика'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В01406) Visual Arts') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В01406 Виз.искусство'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(6В01402) Military Training') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2023-2024', 'url' => 'Протокол по специальности 6В01402 НВП'],
                                                ['class' => 'menu-item']
                                            ) ?>



                                        </div>

                                        <button class="menu-item year-toggle-btn--2023">2022–2023 <span>+</span></button>
                                        <div class="ResearchJobStudent-2023">

                                        </div>

                                        <button class="menu-item year-toggle-btn--2022">2021–2022 <span>+</span></button>
                                        <div class="ResearchJobStudent-2022">
                                            <?= Html::a(
                                                Yii::t('app', '(5В060600) Chemistry') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2021-2022', 'url' => 'Протокол по специальности 5В060600 химия'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В050800) Accounting and Audit') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2021-2022', 'url' => 'Протокол по специальности 5В050800 учет и аудит'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В0502000) Political Science') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2021-2022', 'url' => 'Протокол по специальности 5В0502000 политология'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В050100) Sociology') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2021-2022', 'url' => 'Протокол по специальности 5В050100 социология'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В011500) Fundamentals of Law and Economics') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2021-2022', 'url' => 'Протокол по специальности 5В011500 основы права и экономики'],
                                                ['class' => 'menu-item']
                                            ) ?>
                                        </div>

                                        <button class="menu-item year-toggle-btn--2021">2020–2021 <span>+</span></button>
                                        <div class="ResearchJobStudent-2021">
                                            <?= Html::a(
                                                Yii::t('app', '(5В090500) Social Work') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В090500 Социальная работа'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В071600) Instrument Engineering') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В071600 Приборостроение'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В052100) State Audit') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В052100 Государственный аудит'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В020700) Translation Studies') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В020700 Переводческое дело'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В012000) Vocational Training') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В012000 Профессиональное обучение'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                            <?= Html::a(
                                                Yii::t('app', '(5В011900) Foreign Language: Two Foreign Languages') . ' <span>></span>',
                                                ['site/open-general-pdf', 'path' => '/files/pdf/Science/НИРС', 'year' => '2020-2021', 'url' => 'Протокол по специальности 5В011900 Иностранный язык два иностранных языка'],
                                                ['class' => 'menu-item']
                                            ) ?>

                                        </div>





                                    </div>
                                    <div class="social">

                                        <!-- YouTube -->
                                        <a href="https://youtube.com/@karagandastateuniversity?si=HrRoPybxJbg-VG_Y"
                                            target="_blank">
                                            <svg width="39" height="27" viewBox="0 0 39 27" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.75 19.125L25.4812 13.5L15.75 7.875V19.125ZM37.425 4.44375C37.6687 5.325 37.8375 6.50625 37.95 8.00625C38.0813 9.50625 38.1375 10.8 38.1375 11.925L38.25 13.5C38.25 17.6063 37.95 20.625 37.425 22.5562C36.9562 24.2437 35.8687 25.3312 34.1812 25.8C33.3 26.0437 31.6875 26.2125 29.2125 26.325C26.775 26.4563 24.5438 26.5125 22.4813 26.5125L19.5 26.625C11.6437 26.625 6.75 26.325 4.81875 25.8C3.13125 25.3312 2.04375 24.2437 1.575 22.5562C1.33125 21.675 1.1625 20.4938 1.05 18.9938C0.91875 17.4938 0.8625 16.2 0.8625 15.075L0.75 13.5C0.75 9.39375 1.05 6.375 1.575 4.44375C2.04375 2.75625 3.13125 1.66875 4.81875 1.2C5.7 0.95625 7.3125 0.7875 9.7875 0.675C12.225 0.54375 14.4562 0.4875 16.5187 0.4875L19.5 0.375C27.3563 0.375 32.25 0.675 34.1812 1.2C35.8687 1.66875 36.9562 2.75625 37.425 4.44375Z"
                                                    fill="white" />
                                            </svg>
                                        </a>

                                        <!-- Instagram -->
                                        <a href="https://www.instagram.com/buketov.university?igsh=MThseGUwY3NjN2dtZA=="
                                            target="_blank">
                                            <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.625 0.75H27.375C33.375 0.75 38.25 5.625 38.25 11.625V27.375C38.25 30.2592 37.1042 33.0253 35.0648 35.0648C33.0253 37.1042 30.2592 38.25 27.375 38.25H11.625C5.625 38.25 0.75 33.375 0.75 27.375V11.625C0.75 8.74077 1.89576 5.97467 3.93521 3.93521C5.97467 1.89576 8.74077 0.75 11.625 0.75ZM11.25 4.5C9.45979 4.5 7.7429 5.21116 6.47703 6.47703C5.21116 7.7429 4.5 9.45979 4.5 11.25V27.75C4.5 31.4812 7.51875 34.5 11.25 34.5H27.75C29.5402 34.5 31.2571 33.7888 32.523 32.523C33.7888 31.2571 34.5 29.5402 34.5 27.75V11.25C34.5 7.51875 31.4812 4.5 27.75 4.5H11.25ZM29.3438 7.3125C29.9654 7.3125 30.5615 7.55943 31.001 7.99897C31.4406 8.43851 31.6875 9.03465 31.6875 9.65625C31.6875 10.2779 31.4406 10.874 31.001 11.3135C30.5615 11.7531 29.9654 12 29.3438 12C28.7221 12 28.126 11.7531 27.6865 11.3135C27.2469 10.874 27 10.2779 27 9.65625C27 9.03465 27.2469 8.43851 27.6865 7.99897C28.126 7.55943 28.7221 7.3125 29.3438 7.3125ZM19.5 10.125C21.9864 10.125 24.371 11.1127 26.1291 12.8709C27.8873 14.629 28.875 17.0136 28.875 19.5C28.875 21.9864 27.8873 24.371 26.1291 26.1291C24.371 27.8873 21.9864 28.875 19.5 28.875C17.0136 28.875 14.629 27.8873 12.8709 26.1291C11.1127 24.371 10.125 21.9864 10.125 19.5C10.125 17.0136 11.1127 14.629 12.8709 12.8709C14.629 11.1127 17.0136 10.125 19.5 10.125ZM19.5 13.875C18.0082 13.875 16.5774 14.4676 15.5225 15.5225C14.4676 16.5774 13.875 18.0082 13.875 19.5C13.875 20.9918 14.4676 22.4226 15.5225 23.4775C16.5774 24.5324 18.0082 25.125 19.5 25.125C20.9918 25.125 22.4226 24.5324 23.4775 23.4775C24.5324 22.4226 25.125 20.9918 25.125 19.5C25.125 18.0082 24.5324 16.5774 23.4775 15.5225C22.4226 14.4676 20.9918 13.875 19.5 13.875Z"
                                                    fill="white" />
                                            </svg>
                                        </a>

                                        <!-- TikTok -->
                                        <a href="https://www.tiktok.com/@buketov.university?_t=ZM-8zPpJTHd0ZJ&_r=1"
                                            target="_blank">
                                            <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M26 36.7812C28.8594 36.7812 31.6016 35.6454 33.6235 33.6235C35.6454 31.6016 36.7812 28.8594 36.7812 26V11C36.7812 8.14063 35.6454 5.39838 33.6235 3.3765C31.6016 1.35463 28.8594 0.21875 26 0.21875H11C8.14063 0.21875 5.39838 1.35463 3.3765 3.3765C1.35463 5.39838 0.21875 8.14063 0.21875 11V26C0.21875 28.8594 1.35463 31.6016 3.3765 33.6235C5.39838 35.6454 8.14063 36.7812 11 36.7812H26ZM21.7081 6.80563C21.602 6.48958 21.3871 6.22151 21.1017 6.04923C20.8162 5.87696 20.4789 5.81169 20.1498 5.86508C19.8207 5.91846 19.5213 6.08702 19.305 6.34068C19.0887 6.59435 18.9695 6.91662 18.9688 7.25V24.125C18.9688 24.9594 18.7213 25.775 18.2578 26.4688C17.7942 27.1626 17.1353 27.7033 16.3644 28.0226C15.5936 28.3419 14.7453 28.4255 13.927 28.2627C13.1086 28.0999 12.3569 27.6981 11.7669 27.1081C11.1769 26.5181 10.7751 25.7664 10.6123 24.948C10.4495 24.1297 10.5331 23.2814 10.8524 22.5106C11.1717 21.7397 11.7124 21.0808 12.4062 20.6172C13.1 20.1537 13.9156 19.9062 14.75 19.9062C15.123 19.9063 15.4806 19.7581 15.7444 19.4944C16.0081 19.2306 16.1562 18.873 16.1562 18.5C16.1562 18.127 16.0081 17.7694 15.7444 17.5056C15.4806 17.2419 15.123 17.0938 14.75 17.0938C13.3594 17.0938 11.9999 17.5061 10.8436 18.2787C9.68736 19.0513 8.78615 20.1495 8.25397 21.4343C7.72179 22.7191 7.58255 24.1328 7.85385 25.4967C8.12516 26.8607 8.79482 28.1135 9.77816 29.0968C10.7615 30.0802 12.0143 30.7498 13.3783 31.0211C14.7422 31.2924 16.1559 31.1532 17.4407 30.621C18.7255 30.0888 19.8237 29.1876 20.5963 28.0314C21.3689 26.8751 21.7812 25.5156 21.7812 24.125V11.8588C23.2194 13.1938 25.2444 14.2812 27.875 14.2812C28.248 14.2812 28.6056 14.1331 28.8694 13.8694C29.1331 13.6056 29.2812 13.248 29.2812 12.875C29.2812 12.502 29.1331 12.1444 28.8694 11.8806C28.6056 11.6169 28.248 11.4688 27.875 11.4688C26.0525 11.4688 24.6669 10.7187 23.6394 9.74562C22.5894 8.74812 21.9556 7.54625 21.7081 6.80563Z"
                                                    fill="white" />
                                            </svg>
                                        </a>

                                        <!-- Facebook -->
                                        <a href="https://www.facebook.com/share/1BCrtnkGNj/?mibextid=wwXIfr"
                                            target="_blank">
                                            <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M36.1875 0.75H2.8125C2.26549 0.75 1.74089 0.967299 1.35409 1.35409C0.967299 1.74089 0.75 2.26549 0.75 2.8125V36.1875C0.75 36.7345 0.967299 37.2591 1.35409 37.6459C1.74089 38.0327 2.26549 38.25 2.8125 38.25H20.775V23.7188H15.9V18.0938H20.775V13.875C20.674 12.8845 20.7909 11.884 21.1176 10.9435C21.4442 10.003 21.9727 9.1454 22.6659 8.43077C23.3591 7.71614 24.2002 7.16183 25.1303 6.8067C26.0604 6.45157 27.0569 6.30422 28.05 6.375C29.5094 6.36492 30.9681 6.44005 32.4187 6.6V11.6625H29.4375C27.075 11.6625 26.625 12.7875 26.625 14.4187V18.0375H32.25L31.5187 23.6625H26.625V38.25H36.1875C36.4584 38.25 36.7265 38.1967 36.9768 38.093C37.227 37.9894 37.4544 37.8374 37.6459 37.6459C37.8374 37.4544 37.9894 37.227 38.093 36.9768C38.1967 36.7265 38.25 36.4584 38.25 36.1875V2.8125C38.25 2.54165 38.1967 2.27345 38.093 2.02322C37.9894 1.77298 37.8374 1.54561 37.6459 1.35409C37.4544 1.16257 37.227 1.01065 36.9768 0.906999C36.7265 0.803348 36.4584 0.75 36.1875 0.75Z"
                                                    fill="white" />
                                            </svg>
                                        </a>

                                        <!-- Telegram -->
                                        <a href="https://t.me/buketov_university" target="_blank">
                                            <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5 0.75C9.15 0.75 0.75 9.15 0.75 19.5C0.75 29.85 9.15 38.25 19.5 38.25C29.85 38.25 38.25 29.85 38.25 19.5C38.25 9.15 29.85 0.75 19.5 0.75ZM28.2 13.5C27.9187 16.4625 26.7 23.6625 26.0813 26.9812C25.8188 28.3875 25.2937 28.8563 24.8062 28.9125C23.7187 29.0063 22.8938 28.2 21.8438 27.5063C20.1938 26.4188 19.2563 25.7438 17.6625 24.6938C15.8063 23.475 17.0062 22.8 18.075 21.7125C18.3562 21.4313 23.1562 17.0625 23.25 16.6687C23.263 16.6091 23.2613 16.5472 23.245 16.4884C23.2286 16.4296 23.1982 16.3756 23.1562 16.3313C23.0437 16.2375 22.8937 16.275 22.7625 16.2937C22.5937 16.3312 19.9688 18.075 14.85 21.525C14.1 22.0312 13.425 22.2937 12.825 22.275C12.15 22.2562 10.875 21.9 9.91875 21.5812C8.7375 21.2062 7.81875 21 7.89375 20.3437C7.93125 20.0062 8.4 19.6687 9.28125 19.3125C14.7563 16.9312 18.3938 15.3563 20.2125 14.6063C25.425 12.4313 26.4938 12.0562 27.2063 12.0562C27.3563 12.0562 27.7125 12.0937 27.9375 12.2812C28.125 12.4312 28.1812 12.6375 28.2 12.7875C28.1812 12.9 28.2187 13.2375 28.2 13.5Z"
                                                    fill="white" />
                                            </svg>
                                        </a>









                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </header>
    <?php elseif (Yii::$app->controller->id == 'admin'): ?>
        <div class="w-100 d-flex justify-content-end align-items-center p-2 bg-light border-bottom">
            <span class="text-primary fw-bold">
                <i class="bi bi-person-circle me-2"></i>
                <?= Html::a(
                    Html::img('https://images.icon-icons.com/2518/PNG/512/logout_icon_151219.png', [
                        'alt' => 'Logout',
                        'style' => 'width:24px; height:24px; margin-right:8px;'
                    ]) . Yii::$app->user->identity->username,
                    ['admin/logout'],
                    ['class' => 'text-decoration-none text-dark fw-bold', 'data-method' => 'post']
                ) ?>
            </span>
        </div>
    <?php endif ?>
    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 footer">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-6 text-center text-md-start d-flex flex-column">
                    <?php echo Html::img('/bg-images/logo-buketov.png', [
                        'alt' => 'Buketov Logo',
                        'class' => 'navbar-logo',
                        'style' => '
        max-height: 100px;
        max-width:250px;
        margin-block:20px;
        '
                    ]); ?>
                    <div class="col-md-6 d-flex flex-column justify-content-end" style="min-height: 100px;">
                        <p>Казахстан, Караганда,<br> ул. Университетская, 28</p>
                        <p>&copy; <?= date('Y') ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-end d-flex flex-column justify-content-end"
                    style="min-height: 100px;">
                    <p class="text-xxl-end">Karaganda Buketov University</p>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>