<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'type')
    ->dropDownList([
        'Sample design of the list of works' => 'Sample design of the list of works',
        'Composition of the Council for the current year' => 'Composition of the Council for the current year',
        "The Council's work plan for the current year" => "The Council's work plan for the current year",
        'Draft decisions of the Academic Council' => 'Draft decisions of the Academic Council',
        'Report of the Chairman of the Management Board' => 'Report of the Chairman of the Management Board'
    ],
    ['prompt'=>"Выберите раздел документа"]); ?>
<?= $form->field($model, 'years')
    ->dropDownList([
        "2020-2021" => "2020-2021",
        "2021-2022" => "2021-2022",
        "2022-2023" => "2022-2023",
        "2023-2024" => "2023-2024",
        "2024-2025" => "2024-2025",
        "2025-2026" => "2025-2026",
        "2026-2027" => "2026-2027",
        "2027-2028" => "2027-2028",
        "2028-2029" => "2028-2029",
        "2029-2030" => "2029-2030",
        "2030-2031" => "2030-2031",

    ],
    ['prompt'=>"Год документа"]); ?>
<?= $form->field($model, 'language_file')
    ->dropDownList(
        [
            "kz" => "kz",
            "ru" => "ru",
            "en" => "en"
        ],
        ['prompt' => "Выберите язык документа"]
    ); ?>
<?= $form->field($model, 'files[]')
    ->fileInput(
        [
            'multiple' => true,
            'accept' => "application/pdf,application/msword"
        ]
    );
?>
<?= Html::submitButton("submit", ['class' => 'btn btn-success']); ?>
<?php ActiveForm::end(); ?>