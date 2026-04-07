<?php

/** @var yii\web\View $this */
use app\assets\HomeAsset;
use app\components\LanguageHelper;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

HomeAsset::register($this);


$this->title = 'Buketov University';
?>




<div class="main-wrapper d-flex flex-column justify-content-center align-items-center w-100">
    <div class="first-block d-flex justify-content-center align-items-cente w-100 h-100">
        <div class="first-block-half p-5">
            <img src="/bg-images/bg-first-block-half1.png" width="90%" style="filter: drop-shadow(2px 4px 6px black);">
            <div class="university-branding text-start">
                <p class="university-name">BUKETOV UNIVERSITY</p>
                <p class="university-motto"><?php echo Yii::t('app', 'Karaganda National Research University') ?></p>
                <p class="university-year"><?php echo Yii::t('app', 'since 1938') ?></p>
            </div>


        </div>
        <div class="col-md-12 w-100" style="overflow:hidden">
            <video style="object-fit: cover;height:100vh;" width="100%" autoplay="autoplay" playsinline="" muted="muted"
                poster="https://up.buketov.edu.kz/event/2025/08_12/1.jpg" loop="loop" class="video">
                <source src="/bg-videos/DJI_0091.MP4" type="video/mp4">
            </video>
            <script>
                const video = document.getElementById('bgVideo');
                video.addEventListener('ended', () => {
                    video.currentTime = 0;
                    video.play();
                });
            </script>
        </div>
    </div>
    <div class="second-block col-md-12 d-flex justify-content-center">
        <div class="carousel-flex">
            <div class="carousel">
                <div class="list">
                    <div class="item">
                        <img
                            src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/pER4VTSx8_2R4hiiG8NWI.jpg">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'National Quality Mark "PERFECT"') ?></div>
                            <div class="description">
                                <?= Yii::t('app', 'This is public recognition of goods and services distinguished by high quality, reliability and consumer trust.') ?>
                            </div>
                            <!-- <div class="button"><?= Yii::t('app', 'View') ?></div> -->


                        </div>
                    </div>
                    <div class="item">
                        <img
                            src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/D5F3GVnPnEBj7X9uQa-10.jpg">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'Corporate culture of a modern university') ?></div>
                            <div class="description">
                                <?= Yii::t('app', 'This is public recognition of goods and services distinguished by high quality, reliability and consumer trust.') ?>
                            </div>
                            <!-- <div class="button"><?= Yii::t('app', 'View') ?></div> -->


                        </div>
                    </div>
                    <div class="item">

                        <img src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/LZO0tcZoSk6-Mxrz96cuS.jpg"
                            style="object-position: center 35%;">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'Hotline') ?></div>
                            <div class="description">
                                <?= Yii::t('app', 'This is the public recognition of goods and services that are distinguished by high quality, reliability, and consumer trust.') ?>
                            </div>
                            <div class="tel">
                                <div class="svg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                                    </svg>
                                </div>
                                <span>+7 (721) 290 02 70
                            </div>
                            <!-- <div class="button"><?= Yii::t('app', 'View') ?></div> -->


                        </div>
                    </div>
                </div>
                <div class="thumbnail">
                    <div class="item">
                        <div class="overly"></div>
                        <img
                            src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/pER4VTSx8_2R4hiiG8NWI.jpg">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'National Quality Mark "PERFECT"') ?></div>

                        </div>

                    </div>
                    <div class="item">
                        <div class="overly"></div>
                        <img
                            src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/D5F3GVnPnEBj7X9uQa-10.jpg">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'Corporate culture of a modern university') ?></div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="overly"></div>
                        <img
                            src="https://storage.vigbo.tech/p/s2500/gallery-photo/27833ae7-1146-486e-bcd4-e5cec2edb815/f1377e4e-0060-48db-a843-ef23efa8db63/original/LZO0tcZoSk6-Mxrz96cuS.jpg">
                        <div class="content">
                            <div class="title"><?= Yii::t('app', 'Hotline') ?></div>


                        </div>
                    </div>
                </div>
                <div class="arrows">
                    <button id="prev">
                        < </button>
                            <button id="next">></button>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 d-flex justify-content-center align-items-center block-header py-3">
        <p><?= Yii::t('app', 'Place of the University in the world ranking') ?></p>
    </div>
    <div class="col-md-10 carousel-ranking">

        <?php $ratingCount = count($ranking); ?>

    <div style="width: 100%" class="ratings-container">

            <?php foreach ($ranking as $ranking_item): ?>

                <div class="rating-box" onclick="openBox(this, 'ranking')" data-title="<?= $ranking_item['title'] ?? '' ?>"
                    data-content="<?= htmlspecialchars($ranking_item['content'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    data-date="<?= date('Y-m-d') ?>"
                    data-img="<?= htmlspecialchars($ranking_item['image'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    <div
                        style=" background: linear-gradient(to top, rgba(0, 31, 63, 0.9) 0%, rgba(0, 31, 63, 0.3) 50%, rgba(0, 31, 63, 0) 100%), url('<?= htmlspecialchars_decode($ranking_item['image']); ?>') center center / cover no-repeat;">
                        <div class="logo">
                            <span>Рейтинги</span>
                            <img src="https://abiturient.buketov.edu.kz/images/logo2023.png" alt="Логотип">
                        </div>
                        <h2> <?= Html::decode($ranking_item['title']) ?></h2>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="move-rankings-container">
            <button class="moveLeftRatings" onclick="moveRatings('left' , <?= $ratingCount * 320 ?>)">&lt;</button>
            <button class="moveRightRatings" onclick="moveRatings('right',<?= $ratingCount * 320 ?>)">&gt;</button>
        </div>
    </div>
    <div class="third-block row col-md-12 w-100 d-flex flex-column align-items-center py-3">

        <div class="col-md-10 d-flex justify-content-center align-items-center block-header">
            <p><?= Yii::t('app', 'Admission Instructions') ?></p>
        </div>
        <div class="col-md-10 d-flex flex-column align-items:center my-3">

            <div class="admission-slider col-md-12 overflow-hidden w-100">
                <div class="p-2 d-flex">
                    <div class="admission-slider-first-part w-100 d-flex justify-content-around align-items-center">
                        <div class="block-admission d-flex justify-content-start align-items-center col-md-3 w-30 my-3">
                            <div class="box-icon d-flex align-items-center justify-content-center">
                                <img width="100%" height="100%" src="/bg-images/bachelor.png">
                            </div>
                            <div class="d-flex flex-column justify-content-center px-2">
                                <?= Html::a(Yii::t('app', 'Bachelor') . ' <span>></span>', ['site/admission', 'type' => 'bachelor'], ['class' => 'menu-item edu-title']) ?>

                                <p class="edu-text edu-text--bachelor m-0">
                                    <?= Yii::t('app', 'Admission instructions') ?>
                                </p>
                            </div>
                        </div>
                        <div class="block-admission d-flex justify-content-start align-items-center col-md-3 w-30 my-3">
                            <div class="box-icon d-flex align-items-center justify-content-center">
                                <img width="100%" height="100%" src="/bg-images/magistracy.png">
                            </div>
                            <div class="d-flex flex-column justify-content-center px-2">
                                <?= Html::a(Yii::t('app', 'Magistracy') . ' <span>></span>', ['site/admission', 'type' => 'magistracy'], ['class' => 'menu-item edu-title']) ?>
                                <p class="edu-text edu-text--bachelor m-0">
                                    <?= Yii::t('app', 'Admission instructions') ?>
                                </p>
                            </div>
                        </div>
                        <div class="block-admission d-flex justify-content-start align-items-center col-md-3 w-30 my-3">
                            <div class="box-icon d-flex align-items-center justify-content-center">
                                <img width="100%" height="100%" src="/bg-images/doctorant.png">

                            </div>
                            <div class="d-flex flex-column justify-content-center px-2">
                                <a href="#" style="">
                                    <?= Html::a(Yii::t('app', 'Doctorate') . ' <span>></span>', ['site/admission', 'type' => 'doctoral'], ['class' => 'menu-item edu-title']) ?>

                                </a>
                                <p class="edu-text edu-text--bachelor m-0">
                                    <?= Yii::t('app', 'Admission instructions') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="admission-slider-second-part d-flex justify-content-around w-100">
                        <div class="d-flex justify-content-start align-items-center col-md-3 w-50 my-3">
                            <div class="box-icon d-flex align-items-center justify-content-center">
                                <svg width="51" height="51" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 21C4.45 21 3.97934 20.8043 3.588 20.413C3.19667 20.0217 3.00067 19.5507 3 19V16C3 15.7167 3.096 15.4793 3.288 15.288C3.48 15.0967 3.71734 15.0007 4 15C4.28267 14.9993 4.52034 15.0953 4.713 15.288C4.90567 15.4807 5.00134 15.718 5 16V19H19V5H5V8C5 8.28333 4.904 8.521 4.712 8.713C4.52 8.905 4.28267 9.00067 4 9C3.71734 8.99933 3.48 8.90333 3.288 8.712C3.096 8.52067 3 8.28333 3 8V5C3 4.45 3.196 3.97933 3.588 3.588C3.98 3.19667 4.45067 3.00067 5 3H19C19.55 3 20.021 3.196 20.413 3.588C20.805 3.98 21.0007 4.45067 21 5V19C21 19.55 20.8043 20.021 20.413 20.413C20.0217 20.805 19.5507 21.0007 19 21H5ZM11.65 13H4C3.71667 13 3.47934 12.904 3.288 12.712C3.09667 12.52 3.00067 12.2827 3 12C2.99934 11.7173 3.09534 11.48 3.288 11.288C3.48067 11.096 3.718 11 4 11H11.65L9.8 9.15C9.6 8.95 9.504 8.71667 9.512 8.45C9.52 8.18333 9.616 7.95 9.8 7.75C10 7.55 10.2377 7.446 10.513 7.438C10.7883 7.43 11.0257 7.52567 11.225 7.725L14.8 11.3C14.9 11.4 14.971 11.5083 15.013 11.625C15.055 11.7417 15.0757 11.8667 15.075 12C15.0743 12.1333 15.0537 12.2583 15.013 12.375C14.9723 12.4917 14.9013 12.6 14.8 12.7L11.225 16.275C11.025 16.475 10.7877 16.571 10.513 16.563C10.2383 16.555 10.0007 16.4507 9.8 16.25C9.61667 16.05 9.52067 15.8167 9.512 15.55C9.50334 15.2833 9.59934 15.05 9.8 14.85L11.65 13Z"
                                        fill="#F5F5F5"></path>
                                </svg>
                            </div>
                            <div class="d-flex flex-column justify-content-center px-2 ">
                                <?= Html::a(Yii::t('app', 'Mobility programs') . '<span>></span>', ['site/academ-mobility'], ['class' => 'menu-item edu-title']) ?>


                                <p class="edu-text edu-text--bachelor m-0">
                                    <?= Yii::t('app', 'Learn about the admission instructions for academic mobility programs') ?>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center col-md-3 w-50 my-3">
                            <div class="box-icon d-flex align-items-center justify-content-center">
                                <svg width="51" height="51" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_136_73)">
                                        <path
                                            d="M13.6637 7.36151C14.9785 7.36151 15.7612 8.14476 15.7612 9.34426V14.9593C15.7612 15.3943 15.7222 15.7465 15.7222 15.7465H9.71825V10.2893H9.4735L8.359 11.952C8.1775 12.1995 7.809 12.3195 7.5155 12.3195H4.89925C4.79592 12.3196 4.69359 12.2993 4.59809 12.2599C4.5026 12.2204 4.41582 12.1625 4.34271 12.0895C4.2696 12.0165 4.2116 11.9298 4.17201 11.8343C4.13242 11.7389 4.11203 11.6366 4.112 11.5333C4.112 11.0998 4.46425 10.7575 4.89925 10.7575H7.27875L8.92925 8.26101C9.3255 7.65726 10.0587 7.36926 10.7212 7.36926C10.7212 9.12501 11.1587 9.86801 11.9497 9.86801V12.787C11.8373 12.8352 11.7415 12.9153 11.6742 13.0174C11.6069 13.1196 11.571 13.2392 11.571 13.3615C11.5706 13.4432 11.5864 13.5241 11.6175 13.5996C11.6486 13.6751 11.6943 13.7437 11.752 13.8014C11.8097 13.8592 11.8782 13.9049 11.9537 13.9361C12.0292 13.9672 12.1101 13.9831 12.1917 13.9828C12.537 13.9828 12.8135 13.699 12.8135 13.353C12.8135 13.0955 12.6572 12.8745 12.4347 12.7793V9.85926C13.2252 9.85901 13.6632 9.11701 13.6632 7.36151H13.6637ZM13.1705 7.36151C13.1565 9.16126 12.8452 9.39801 12.192 9.39801C11.5395 9.39801 11.228 9.16101 11.2142 7.36151H13.1705ZM12.1812 3.30826C12.4171 3.30819 12.6507 3.35462 12.8686 3.44487C13.0865 3.53513 13.2845 3.66745 13.4513 3.83427C13.618 4.00109 13.7503 4.19914 13.8404 4.41709C13.9306 4.63505 13.9769 4.86864 13.9767 5.10451C13.9767 5.58073 13.7876 6.03745 13.4509 6.37421C13.1142 6.71097 12.6575 6.90019 12.1812 6.90026C11.7049 6.90026 11.2481 6.71109 10.9112 6.37434C10.5743 6.0376 10.3849 5.58084 10.3847 5.10451C10.3847 4.8686 10.4312 4.635 10.5215 4.41706C10.6118 4.19911 10.7441 4.00108 10.9109 3.83428C11.0778 3.66748 11.2758 3.53518 11.4938 3.44492C11.7117 3.35466 11.9453 3.30823 12.1812 3.30826ZM7.76775 3.55376C7.82084 3.55501 7.87364 3.54561 7.92304 3.52614C7.97245 3.50666 8.01745 3.4775 8.05541 3.44036C8.09337 3.40322 8.12351 3.35886 8.14406 3.3099C8.16461 3.26093 8.17516 3.20835 8.17508 3.15524C8.17499 3.10214 8.16428 3.04959 8.14358 3.00069C8.12287 2.95179 8.09259 2.90753 8.05452 2.87051C8.01644 2.83349 7.97134 2.80447 7.92188 2.78515C7.87241 2.76582 7.81958 2.7566 7.7665 2.75801C7.6627 2.76077 7.56409 2.80398 7.49171 2.87843C7.41933 2.95288 7.37891 3.05266 7.37908 3.15649C7.37924 3.26033 7.41997 3.35998 7.49259 3.4342C7.5652 3.50842 7.66394 3.55133 7.76775 3.55376ZM4.925 1.36151C4.99942 1.36148 5.07311 1.34679 5.14186 1.31827C5.21061 1.28976 5.27307 1.24799 5.32568 1.19534C5.37828 1.14269 5.42 1.08019 5.44845 1.01142C5.4769 0.942641 5.49153 0.868937 5.4915 0.79451C5.49146 0.720084 5.47677 0.646392 5.44826 0.577644C5.41975 0.508895 5.37797 0.446435 5.32532 0.393831C5.27267 0.341226 5.21018 0.299507 5.1414 0.271056C5.07263 0.242604 4.99892 0.227978 4.9245 0.22801C4.77419 0.228077 4.63006 0.287851 4.52382 0.394184C4.41758 0.500517 4.35793 0.644699 4.358 0.79501C4.35806 0.945322 4.41784 1.08945 4.52417 1.19569C4.6305 1.30193 4.77469 1.36158 4.925 1.36151ZM1.84825 1.36526C2.00026 1.36586 2.1463 1.30608 2.25426 1.19906C2.36222 1.09203 2.42327 0.946526 2.424 0.79451C2.42327 0.642495 2.36222 0.496988 2.25426 0.389966C2.1463 0.282943 2.00026 0.223162 1.84825 0.22376C1.773 0.223431 1.69843 0.237939 1.6288 0.266453C1.55916 0.294967 1.49583 0.336929 1.44243 0.389937C1.38903 0.442946 1.3466 0.505963 1.31757 0.575383C1.28854 0.644803 1.27348 0.719265 1.27325 0.79451C1.27348 0.869756 1.28854 0.944218 1.31757 1.01364C1.3466 1.08306 1.38903 1.14607 1.44243 1.19908C1.49583 1.25209 1.55916 1.29405 1.6288 1.32257C1.69843 1.35108 1.773 1.36559 1.84825 1.36526Z"
                                            fill="#F5F5F5"></path>
                                        <path
                                            d="M7.228 6.98647C7.22846 7.04849 7.25342 7.10782 7.29744 7.15151C7.34146 7.1952 7.40097 7.21972 7.463 7.21972C7.5248 7.21959 7.58402 7.19496 7.6277 7.15124C7.67137 7.10752 7.69593 7.04827 7.696 6.98647V5.59147H7.8785V6.98647C7.8785 7.11497 7.983 7.21972 8.112 7.21972C8.17394 7.21959 8.23332 7.19501 8.27723 7.15133C8.32114 7.10766 8.34604 7.04841 8.3465 6.98647V4.37872H8.527V5.26297C8.527 5.35922 8.60475 5.43722 8.7005 5.43722C8.72326 5.43716 8.74578 5.43259 8.76676 5.42378C8.78775 5.41497 8.80678 5.4021 8.82277 5.3859C8.83876 5.3697 8.85139 5.3505 8.85992 5.32941C8.86845 5.30831 8.87273 5.28573 8.8725 5.26297V4.25772C8.8725 3.97622 8.6245 3.74797 8.344 3.74797C8.344 3.74797 7.265 3.74872 7.2605 3.74922L6.91125 3.71547L6.4625 2.15147C6.2815 1.52072 5.7535 1.54072 5.7535 1.54072H4.29875C4.29875 1.54072 3.77075 1.52072 3.58975 2.15147L3.35475 2.97047L3.11975 2.15147C2.93875 1.52072 2.41075 1.54072 2.41075 1.54072H1.28525C1.28525 1.54072 0.757498 1.52072 0.576498 2.15147L0.123498 3.72972C0.0802478 3.87697 0.152498 4.01447 0.280998 4.05172C0.409998 4.08822 0.550748 3.99872 0.585248 3.88097L1.025 2.34222H1.24025L0.596248 5.00572H1.16525V6.89772C1.16525 7.05372 1.291 7.18022 1.447 7.18022C1.60325 7.18022 1.73075 7.05372 1.73075 6.89772V5.00572H1.969V6.89772C1.969 6.97264 1.99876 7.0445 2.05174 7.09748C2.10472 7.15046 2.17657 7.18022 2.2515 7.18022C2.32642 7.18022 2.39828 7.15046 2.45126 7.09748C2.50423 7.0445 2.534 6.97264 2.534 6.89772V5.00572H3.09375L2.4555 2.34222H2.67075L3.111 3.88097C3.141 3.98322 3.23475 4.06572 3.3455 4.05647C3.45625 4.06597 3.56925 3.98297 3.59825 3.88097L4.039 2.34222H4.23725V6.84322C4.23963 6.93006 4.27579 7.01254 4.33805 7.07312C4.40031 7.1337 4.48375 7.16759 4.57062 7.16759C4.65749 7.16759 4.74093 7.1337 4.80319 7.07312C4.86545 7.01254 4.90162 6.93006 4.904 6.84322V4.28247H5.14975V6.84322C5.15308 6.9293 5.18963 7.01075 5.25171 7.07048C5.3138 7.1302 5.3966 7.16356 5.48275 7.16356C5.5689 7.16356 5.6517 7.1302 5.71378 7.07048C5.77587 7.01075 5.81241 6.9293 5.81575 6.84322V2.34222H6.031L6.44025 3.82972C6.466 3.91897 6.5585 4.00597 6.65775 4.03597L7.2285 4.19572V6.98672L7.228 6.98647Z"
                                            fill="#F5F5F5"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_136_73">
                                            <rect width="16" height="16" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="d-flex flex-column justify-content-center px-2">

                                <?= Html::a(Yii::t('app', 'Internship programs') . '<span>></span>', ['site/academ-mobility'], ['class' => 'menu-item edu-title']) ?>

                                <p class="edu-text edu-text--bachelor m-0">
                                    <?= Yii::t('app', 'Learn about the admission instructions for academic mobility programs') ?>
                                </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 d-flex justify-content-center align-items-center block-header py-3">
        <p><?= Yii::t('app', 'Faculties') ?></p>
    </div>
    <div class="col-md-10 carousel-faculty">

        <?php $facultyCount = count($faculty); ?>

        <div style="width: <?= $facultyCount * 320 ?>px;" class="faculty-container">

            <?php foreach ($faculty as $faculty_items): ?>

                <div class="faculty-box">

                    <div class="logo">
                        <span><?= Yii::t('app', 'Faculty') ?></span>

                        <img src="https://abiturient.buketov.edu.kz/images/logo2023.png" alt="Логотип">
                    </div>

                    <div class="text">
                        <h2><?= htmlspecialchars($faculty_items['name']) ?></h2>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="move-faculty-container">
            <button class="moveLeftFaculty" onclick="moveFaculty('left' , <?= $facultyCount * 320 ?>)">&lt;</button>
            <button class="moveRightFaculty" onclick="moveFaculty('right',<?= $facultyCount * 320 ?>)">&gt;</button>
        </div>
    </div>
    <div class="fourth-block row col-md-12 w-100 d-flex flex-column align-items-center py-3">
        <div class="col-md-10 d-flex justify-content-center align-items-center block-header">
            <p><?= Yii::t('app', 'News') ?></p>
        </div>
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 col-md-10 d-flex justify-content-between align-items-stretch news-block">
            <?php foreach ($news as $news_item): ?>

                <div onclick="openBox(this, 'news')" data-title="<?= $news_item['title'] ?? '' ?>"
                    data-content="<?= htmlspecialchars($news_item['content'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    data-date="<?= Yii::$app->formatter->asDate($news_item['date'], 'php:d.m.Y') ?>"
                    data-img="<?= htmlspecialchars($news_item['image'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    class="col news-item">

                    <div class="card shadow-sm" style="--news-image: url('/files/images/news/<?= htmlspecialchars($news_item['image'] ?? '', ENT_QUOTES, 'UTF-8') ?>');  
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;">

                        <div class="card-body news-text">
                            <p class="card-text short-text"><?= $news_item['title'] ?? '' ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="white-body-secondary">
                                    <?= Yii::$app->formatter->asDate($news_item['date'], 'php:d.m.Y') ?>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="blur"></div>
    <div class="box-overlay"></div>

    <div class="fifth-block row col-md-12 w-100 d-flex flex-column align-items-center py-3">
        <div class="col-md-10 d-flex justify-content-center align-items-center block-header">
            <p><?= Yii::t('app', 'Upcoming Events') ?></p>
        </div>
        <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 col-md-10 d-flex justify-content-between align-items-stretch upcoming-event">
            <?php foreach ($events as $event_item): ?>
                <?php
                $month = date('F', $event_item['month']);
                $day = $event_item['day'];
                $year = $event_item['year'];

                ?>
                <div class="col upcoming-event-item ">
                    <div class="calendar-card">
                        <div class="calendar-bg"></div>
                        <div onclick="openBoxEvents(this, 'open')"
                            data-time_events="<?= $day . "-" . $month . "-" . $year ?>"
                            data-title="<?= $event_item['title'] ?>" data-content="<?= $event_item['content'] ?>"
                            class="calendar-content">


                            <p class="upcoming-event-day"><?= $day ?></p>
                            <p class="upcoming-event-date"><?= $month . " " . $year ?></p>
                            <p class="upcoming-event-title"><?= $event_item['title'] ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="button-section m-0 col-md-10">
            <?= Html::a(Yii::t('app', 'View all events'), ['/site/events'], ['class' => 'btn btn-primary']) ?>

        </div>
    </div>
    <div class="more-events-overlay"></div>

    <div class="sixth-block row col-md-12 w-100 d-flex flex-column align-items-center py-3">
        <div class="col-md-10 d-flex justify-content-center align-items-center block-header">
            <p><?= Yii::t('app', 'Rector\'s Blog') ?>
            </p>
        </div>

        <div class="col-md-10 d-flex justify-content-between align-items-center block-rector">
            <div class="col-md-4  d-flex flex-column justify-content-start align-items-start box-img-rector">
                <div class="skewX"></div>
                <img src="/bg-images/Dulatbekov_Nurlan.jpg">
            </div>
            <?php
            $surname = LanguageHelper::surname();
            $name = LanguageHelper::name();
            $patronymic = LanguageHelper::patronymic();
            $job_title = LanguageHelper::job_title();
            $welcome = LanguageHelper::welcome();



            ?>
            <div class="d-flex flex-column justify-content-center align-items-start rector-info-block">
                <p class="name-rector">
                    <?= mb_strtoupper($rector->$surname . " " . $rector->$name . " " . $rector->$patronymic) ?>
                </p>
                <p class="rector-position">
                    <?= Yii::t('app', 'Chairman of the Management Board') . " - " . $rector->$job_title ?>
                </p>
                <p class="rector-text"><?= $rector->$welcome ?>

            </div>

        </div>
    </div>

    <div class="seventh-block row col-md-12 w-100 d-flex flex-column align-items-center py-3">
        <!--<div class="col-md-10 d-flex justify-content-center align-items-center block-header">
        <p>Форма обратной связи</p>
    </div>-->
        <div class="block-select-btns col-md-10 p-0 d-flex justify-content-between ">
            <button type="button" class="admissionBtnLeft col-md-6 active position-relative">
                <span class="position-absolute top-0 start-0 w-100 h-100 admission-btn-bg"></span>
                <?= Yii::t('app', 'Feedback Form') ?> </button>
            <button type="button" class="admissionBtnRight col-md-6"
                onclick="document.getElementById('admissionModal').style.display='flex';">
                <?= Yii::t('app', 'Citizens Reception Schedule') ?></button>

        </div>
        <div id="admissionModal" class="modal">

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

                <button class="close-btn" onclick="document.getElementById('admissionModal').style.display='none';"
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
                    <?= Yii::t("app", "Reception schedule for citizens") ?>
                </h2>


                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background-color: #f1f1f1;">
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left; color: #1f3b6e;">
                                <?= Yii::t("app", "Day") ?>
                            </th>
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left; color: #1f3b6e;">
                                <?= Yii::t("app", "Time (Уақыты / Время)") ?>
                            </th>
                            <th style="padding: 12px; border: 1px solid #ddd; text-align: left; color: #1f3b6e;">
                                <?= Yii::t("app", "Responsible person") ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Monday") ?>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd;">14:00 – 17:00</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Specialist") ?>
                            </td>
                        </tr>
                        <tr style="background-color: #f9f9f9;">
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Tuesday") ?>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd;">10:00 – 13:00</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Specialist") ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Wednesday") ?>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd;">14:00 – 17:00</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Commission secretary") ?>
                            </td>
                        </tr>
                        <tr style="background-color: #f9f9f9;">
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Thursday") ?>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd;">10:00 – 13:00</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Commission secretary") ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Friday") ?>
                            </td>
                            <td style="padding: 12px; border: 1px solid #ddd;">14:00 – 16:00</td>
                            <td style="padding: 12px; border: 1px solid #ddd;">
                                <?= Yii::t("app", "Specialist") ?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p style="margin-top: 20px; font-size: 0.9em; color: #555;">
                    <?= Yii::t("app", "*Reception is conducted by prior appointment. For more information, you can call by phone.") ?>
                </p>

            </div>
        </div>
        <div class="col-md-10 px-0 py-5 feedback-form-section">
            <div class="feedback-form-wrapper p-0 rounded bg-white">
                <p class="feedback-form-text text-center mb-4">
                    <?= Yii::t('app', 'If you have any questions or suggestions, please fill out the form below and we will get back to you as soon as possible.') ?></button>

                </p>

                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'feedback-form']
                ]) ?>

                <div class="row g-3">
                    <div class="col-md-4">
                        <?= $form->field($model, 'fio')->textInput([
                            'class' => 'form-control form-control-lg',
                            'placeholder' => Yii::t('app', 'Full Name')
                        ])->label(false) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'email')->textInput([
                            'class' => 'form-control form-control-lg',
                            'placeholder' => Yii::t('app', 'Email')
                        ])->label(false) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'phone')->textInput([
                            'class' => 'form-control form-control-lg',
                            'placeholder' => Yii::t('app', 'Phone')
                        ])->label(false) ?>
                    </div>
                </div>
                <div class="mt-3">
                    <?= $form->field($model, 'title')->textInput([
                        'class' => 'form-control form-control-lg',
                        'placeholder' => Yii::t('app', 'Title'),
                    ])->label(false) ?>
                </div>

                <div class="mt-3">
                    <?= $form->field($model, 'message')->textarea([
                        'class' => 'form-control form-control-lg',
                        'placeholder' => Yii::t('app', 'Message'),
                        'rows' => 5
                    ])->label(false) ?>
                </div>

                <div class="mt-4">
                    <?= Html::submitButton(
                        Yii::t('app', 'Submit'),
                        ['class' => 'submitButton btn-lg w-100']
                    ); ?>
                </div>

                <?php ActiveForm::end() ?>
            </div>
        </div>
        <div class="button-section m-0 col-md-10">
            <?= Html::a(Yii::t('app', 'FAQ'), ['/site/messages'], ['class' => 'btn btn-primary']) ?>

        </div>
    </div>

</div>

<div class="chat-widget" id="chat-widget" style="
            width: 100%; 
            max-width: 400px; 
            margin: 50px auto; 
            border: 1px solid #ccc; 
            border-radius: 10px; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
            overflow: hidden; 
            font-family: Arial, sans-serif;
        ">

    <div
        style="display:flex;justify-content:space-between;background-color: #1f3b6e; color: white; padding: 15px; font-size: 1.2rem; font-weight: bold;">
        <p>BUKETOV BOT</p>
        <button class="close_chat_bot2"></button>

    </div>

    <div id="chat-window" style="
                height: 350px; 
                padding: 15px; 
                overflow-y: auto; 
                background-color: #ffffff; 
                display: flex; 
                flex-direction: column;
            ">
    </div>

    <div id="chat-input-area" style="
                padding: 15px; 
                background-color: #eeeeee;
                border-top: 1px solid #ccc;
            ">

        <div id="chat-menu" style="
                    display: flex; 
                    flex-wrap: wrap; 
                    gap: 8px; 
                    margin-bottom: 15px;
                ">
        </div>

    </div>
</div>


<div class="chat-box">
    <div class="header-chat">
        <p>BUKETOV AI</p>
        <button class="close_chat_bot"></button>
    </div>
    <div class="messages"></div>
    <div class="chat-box-input">
        <input class="input-message" type="text" placeholder="Сообщение...">
        <button class="chat-submit"></button>
    </div>
</div>
<!-- <button class="chat-whatsapp"></button> -->
<!-- <button class="chat-phone"></button> -->
<button class="chat-bot"></button>
<button class="chat-bot2"></button>

<button class="chat-open active"></button>