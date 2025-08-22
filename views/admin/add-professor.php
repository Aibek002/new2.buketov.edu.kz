<?php

use yii\bootstrap5\ActiveForm; 
use yii\helpers\Html;
?>

<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Добавить/Редактировать ФИО</h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row g-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'full_name_ru')
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label('ФИО (Русский)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'full_name_kz')
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label('ФИО (Казахский)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'full_name_en')
                        ->textInput(['maxlength' => true, 'class' => 'form-control'])
                        ->label('ФИО (Английский)') ?>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
