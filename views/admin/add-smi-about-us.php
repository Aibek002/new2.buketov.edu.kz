<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SmiAboutUs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="smi-about-us-form container mt-4">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row g-3">
        <!-- Заголовки -->
        <div class="col-md-4">
            <?= $form->field($model, 'title_kz')
                ->textInput(['maxlength' => true])
                ->label('Заголовок (KZ)') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_ru')
                ->textInput(['maxlength' => true])
                ->label('Заголовок (RU)') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_en')
                ->textInput(['maxlength' => true])
                ->label('Заголовок (EN)') ?>
        </div>

        <!-- Контент -->
        <div class="col-md-4">
            <?= $form->field($model, 'content_kz')
                ->textarea(['rows' => 8, 'class'=>'form-control tinymce-editor'])
                ->label('Контент (KZ)') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'content_ru')
                ->textarea(['rows' => 8, 'class'=>'form-control tinymce-editor'])
                ->label('Контент (RU)') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'content_en')
                ->textarea(['rows' => 8, 'class'=>'form-control tinymce-editor'])
                ->label('Контент (EN)') ?>
        </div>
    </div>

    <!-- Кнопки -->
    <div class="d-flex justify-content-end mt-4">
        <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
        <?= Html::a('❌ Отмена', ['index'], ['class' => 'btn btn-secondary ms-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
