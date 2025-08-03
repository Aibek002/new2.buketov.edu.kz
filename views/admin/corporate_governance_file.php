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
    <?= $form->field($model, 'subsection_corporate_governance')->dropDownList(
        [
            'Решения Единственного Акционера' => 'Решения Единственного Акционера',
            'Совет директоров' => 'Совет директоров',
            'Правление' => 'Правление',
            'Корпоративные документы' => 'Корпоративные документы',
            'Устойчивое развитие' => 'Устойчивое развитие'
        ]
        ,
        [
            'class' => 'select-subsection-corpupr',
            'prompt' => 'Выберите подраздел Корпоративного управление'
        ]
    )->label(false);
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
    <?= $form->field($model, 'name_url')->textInput(['class' => 'name_url_input', 'placeholder' => 'Название ссылки'])->label(false); ?>

    <?php ActiveForm::end() ?>
</div>