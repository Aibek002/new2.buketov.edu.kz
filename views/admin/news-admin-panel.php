<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Добавить новость</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3', 'enctype' => 'multipart/form-data']]) ?>

            <div class="col-md-4">
                <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true, 'placeholder' => 'Тақырып (қазақша)'])->label('Title (KZ)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'placeholder' => 'Заголовок (рус)'])->label('Title (RU)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'placeholder' => 'Title (English)'])->label('Title (EN)') ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'content_kz')->textarea(['rows' => 6, 'placeholder' => 'Мәтін (қазақша)'])->label('Content (KZ)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'content_ru')->textarea(['rows' => 6, 'placeholder' => 'Текст (русский)'])->label('Content (RU)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'content_en')->textarea(['rows' => 6, 'placeholder' => 'Text (English)'])->label('Content (EN)') ?>
            </div>
            <div class="col-12 text-end">
                <?= $form->field($images, 'image[]')->fileInput(['multiple' => true]) ?>
            </div>
            <div class="col-12 text-end">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>