<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>

<div class="container my-5">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Загрузка решения единственного акционера</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data', 'class' => 'row g-3']
            ]); ?>

            <div class="col-md-4">
                <?= $form->field($model, 'year')->dropDownList(
                    array_combine(range(2020, 2030), range(2020, 2030)),
                    ['prompt' => 'Выберите год']
                )->label('Год') ?>
            </div>

            <div class="col-md-8">
                <?= $form->field($model, 'name_pdf')->textInput(['maxlength' => true, 'placeholder' => 'Введите название файла'])->label('Название файла') ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'pdf')->fileInput(['accept'=>'application/pdf','multiple' => true, 'class' => 'form-control'])->label('Загрузите PDF-файл') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'lang')->dropDownList([
                    'kz' => 'Қазақша',
                    'ru' => 'Русский',
                    'en' => 'English',
                ], ['prompt' => 'Выберите язык'])->label('Язык документа') ?>
            </div>

            <div class="col-12 text-end">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
