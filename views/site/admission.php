<?php $this->title = Yii::t("app", "Admission Committee");



use app\components\LanguageHelper;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use yii\widgets\ActiveForm;
use app\assets\AdmissionAsset;
AdmissionAsset::register($this);

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

    <div class="bakalavriat active">
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
            <button
                onclick="openGeneralRulesPdf('C:\\Users\\AIBEK\\Desktop\\new2.buketov.edu.kz\\yii2\\web\\bg-images\\additional-links-bg.jpg')">
                Типовые правила
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Правила поступления
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Сроки приема документов
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Программа собеседования
            </button>
        </div>
        <div class="d-flex justify-content-center">
            <embed class="general-rules-pdf" src="" width="50%" height="600" type="application/pdf">
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <button>
                Образовательные программы бакалавриата
            </button>
            <button>
                Приём бакалавриата (очные программы)
            </button>
            <button>
                Сокращённый бакалавриат
            </button>
            <button>
                Программы бакалавриата (сокращ., дистанц., очно)
            </button>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Форма для выбора профильных предметов и доступных профессий") ?>
        </div>
        <div class="p-5"
            style="width: 94vw; height: 500px; background-color: var(--indigoblue-50); border-radius:20px; border:1px solid var(--indigoblue);">

            <select name="subject_id1" id="subject_id1" class="form-control mb-3">
                <option value="">Выберите предмет 1</option>
                <?php foreach ($subjects as $id => $name): ?>
                    <option value="<?= $id ?>"><?= Html::encode($name) ?></option>
                <?php endforeach; ?>
            </select>

            <select name="subject_id2"  id="subject_id2" class="form-control mb-3">
                <option value="">Выберите предмет 2</option>
                <?php foreach ($subjects as $id => $name): ?>
                    <option value="<?= $id ?>"><?= Html::encode($name) ?></option>
                <?php endforeach; ?>
            </select>

            <button id="view" data-lang="<?= $lang =Yii::$app->language ?>"><?=Yii::t('app','View')?></button>
            <div class="title"><p><?=Yii::t('app','Profession')?></p><p><?=Yii::t('app','Semi-passing points')?></p><p><?=Yii::t('app','Passing points')?></p></div>
            <div class="result-profession-bakalavr"></div>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <button>
                Стоимость обучения
            </button>
            <button>
                Льготы
            </button>
            <button>
                Банковские реквизиты Karaganda Buketov University
            </button>
            <button>
                Положение о порядке присуждения именной стипендии
            </button>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Для поступающих на творческие и педагогические направления ") ?>
        </div>
        <div class="button-section">
            <button>
                Поступающим на творческие ОП
            </button>
            <button>
                Поступающим на пед. ОП
            </button>
            <button>
                Расписание творческих/спецэкзаменов
            </button>

        </div>

        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <button>
                Госзаказ 2025–2026
            </button>
            <button>
                Квоты Букетова
            </button>
            <button>
                Баллы и предметы (НЦТ)
            </button>
            <button>
                Контакты приёмной
            </button>
        </div>
    </div>
    <div class="magistrant">
        <div class="title-content">
            <?= Yii::t("app", "Magistrant") ?>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Общие правила и сроки поступления") ?>
        </div>
        <div class="button-section">
            <button
                onclick="openGeneralRulesPdf('C:\\Users\\AIBEK\\Desktop\\new2.buketov.edu.kz\\yii2\\web\\bg-images\\additional-links-bg.jpg')">
                Типовые правила
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Правила поступления
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Сроки приема документов
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Программа собеседования
            </button>
        </div>
        <div class="d-flex justify-content-center">
            <embed class="general-rules-pdf" src="" width="50%" height="600" type="application/pdf">
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <button>
                Образовательные программы бакалавриата
            </button>
            <button>
                Приём бакалавриата (очные программы)
            </button>
            <button>
                Сокращённый бакалавриат
            </button>
            <button>
                Программы бакалавриата (сокращ., дистанц., очно)
            </button>
        </div>

        <div class="title-content">
            <?= Yii::t("app", "Форма для выбора профильных предметов и доступных профессий") ?>
        </div>
        <div
            style="width: 94vw; height: 500px; background-color: var(--indigoblue-50); border-radius:20px; border:1px solid var(--indigoblue);">
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <button>
                Стоимость обучения
            </button>
            <button>
                Льготы
            </button>
            <button>
                Банковские реквизиты Karaganda Buketov University
            </button>
            <button>
                Положение о порядке присуждения именной стипендии
            </button>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Для поступающих на творческие и педагогические направления ") ?>
        </div>
        <div class="button-section">
            <button>
                Поступающим на творческие ОП
            </button>
            <button>
                Поступающим на пед. ОП
            </button>
            <button>
                Расписание творческих/спецэкзаменов
            </button>

        </div>

        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <button>
                Госзаказ 2025–2026
            </button>
            <button>
                Квоты Букетова
            </button>
            <button>
                Баллы и предметы (НЦТ)
            </button>
            <button>
                Контакты приёмной
            </button>
        </div>

    </div>
    <div class="doctorant">
        <div class="title-content">
            <?= Yii::t("app", "Doctorant") ?>

        </div>
        <div class="title-content">
            <?= Yii::t("app", "Общие правила и сроки поступления") ?>
        </div>
        <div class="button-section">
            <button
                onclick="openGeneralRulesPdf('C:\\Users\\AIBEK\\Desktop\\new2.buketov.edu.kz\\yii2\\web\\bg-images\\additional-links-bg.jpg')">
                Типовые правила
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Правила поступления
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Сроки приема документов
            </button>
            <button onclick="openGeneralRulesPdf('/pdf/admission/file1.pdf')">
                Программа собеседования
            </button>
        </div>
        <div class="d-flex justify-content-center">
            <embed class="general-rules-pdf" src="" width="50%" height="600" type="application/pdf">
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Образавательные программы") ?>
        </div>
        <div class="button-section">
            <button>
                Образовательные программы бакалавриата
            </button>
            <button>
                Приём бакалавриата (очные программы)
            </button>
            <button>
                Сокращённый бакалавриат
            </button>
            <button>
                Программы бакалавриата (сокращ., дистанц., очно)
            </button>
        </div>


        <div class="title-content">
            <?= Yii::t("app", "Стоимость обучение") ?>
        </div>
        <div class="button-section">
            <button>
                Стоимость обучения
            </button>
            <button>
                Льготы
            </button>
            <button>
                Банковские реквизиты Karaganda Buketov University
            </button>
            <button>
                Положение о порядке присуждения именной стипендии
            </button>
        </div>
        <div class="title-content">
            <?= Yii::t("app", "Для поступающих на творческие и педагогические направления ") ?>
        </div>
        <div class="button-section">
            <button>
                Поступающим на творческие ОП
            </button>
            <button>
                Поступающим на пед. ОП
            </button>
            <button>
                Расписание творческих/спецэкзаменов
            </button>

        </div>

        <div class="title-content">
            <?= Yii::t("app", "Полезные информации ") ?>
        </div>
        <div class="button-section">
            <button>
                Госзаказ 2025–2026
            </button>
            <button>
                Квоты Букетова
            </button>
            <button>
                Баллы и предметы (НЦТ)
            </button>
            <button>
                Контакты приёмной
            </button>
        </div>
    </div>