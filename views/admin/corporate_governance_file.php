<?php

use yii\bootstrap5\ActiveForm;
use app\assets\CorporateAdminAsset;
use yii\helpers\Html;
CorporateAdminAsset::register($this);
$this->title = "Управление файлами Корпоративного Управление";
?>

<div class="p-5">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'subsection_corporate_governance')
        ->dropDownList(
            [
                'Решения Единственного Акционера' => 'Решения Единственного Акционера',
                'Совет директоров' => 'Совет директоров',
                'Правление' => 'Правление',
                'Корпоративные документы' => 'Корпоративные документы',
                // 'Устойчивое развитие' => 'Устойчивое развитие'
            ]
            ,
            [
                'class' => 'select-subsection-corpupr',
                'prompt' => 'Выберите подраздел Корпоративного управление'
            ]
        )
        ->label(false);
    ?>
    <?= $form->field($model, 'subsec_corp_docs')->dropDownList(['Внутренние нормативные документы' => 'Внутренние нормативные документы', 'Годовые отчеты' => 'Годовые отчеты', 'Финансовые отчеты' => 'Финансовые отчеты', 'Документы АКС' => 'Документы АКС', 'Документы СВА' => 'Документы СВА'],['class'=>'subsec_corp_doc'])->label(false) ?>

    <?= $form->field($model, 'board_subsec')
        ->dropDownList(
            [
                'Заседание Совета директоров' => 'Заседание Совета директоров',
                'Комитеты Совета директоров' => 'Комитеты Совета директоров',
                'Корпоративные события' => 'Корпоративные события',
            ],
            ['class' => 'select-board-subsec', 'prompt' => 'Выберите подраздел Совета директоров']

        )
        ->label(false);
    ?>
    <?= $form->field($model, 'committee_subsec')
        ->dropDownList(
            [
                'Комитет по аудиту' => 'Комитет по аудиту',
                'Комитет по кадрам и вознаграждениям' => 'Комитет по кадрам и вознаграждениям',
                'Комитет по стратегическому планированию' => 'Комитет по стратегическому планированию',
            ],
            ['class' => 'select-committee-subsec', 'prompt' => 'Выберите подраздел  Комитета Совета директоров']

        )
        ->label(false);
    ?>
    <?= $form->field($model, 'date')->input('date', ['class' => 'form-select select-date'])->label(false) ?>
    <?= $form->field($model, 'text')->textarea(['class' => 'form-select input-text'])->label(false); ?>
    <?= $form->field($model, 'committee_subsection')
        ->dropDownList(
            [
                'Положение' => 'Положение',
                'План' => 'План',
                'Заседание' => 'Заседание',

            ],
            [
                'prompt' => 'Выберите тип подраздела Комитета',
                'class' => 'select-committee-subsection',

            ]
        )
        ->label(false);
    ?>
    <?= $form->field($model, 'year')
        ->dropDownList(
            [
                '2020' => '2020',
                '2021' => '2021',
                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
                '2026' => '2026',
                '2027' => '2027',
                '2028' => '2028',
                '2029' => '2029',

            ],
            ['class' => 'select-year', 'prompt' => 'Выберите год']
        )
        ->label(false);
    ?>
    <?= $form->field($model, 'file')->fileInput(['class' => 'select-file', 'placeholder' => 'Выберите файл'])->label(false) ?>
    <?= $form->field($model, 'language_file')->dropDownList(['kz' => 'Қазақша', 'ru' => 'Русский', 'en' => 'English'], ['class' => 'language_file', 'prompt' => 'Выберите язык файла'])->label(false); ?>
    <?= $form->field($model, 'name_url')->textInput(['class' => 'form-control name_url_input', 'placeholder' => 'Название ссылки'])->label(false); ?>


    <?= Html::submitButton('Submit', ['class' => 'submitButton btn btn-success w-100']) ?>
    <?php ActiveForm::end() ?>
</div>