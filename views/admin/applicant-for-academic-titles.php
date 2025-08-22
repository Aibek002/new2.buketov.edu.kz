<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; 
use app\assets\ApplicantAdminAsset;

ApplicantAdminAsset::register($this);
?>

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Загрузка файлов для профессора</h5>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row mb-3">
                <div class="col-md-12">
                    <input class="search-applicant-professor form-control" placeholder="Поиск по фамилии...">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Выберите профессора</label>
                    <?= $form->field($model, 'professor_id')->radioList([], [
                        'class' => 'staff-radio-list d-flex flex-wrap gap-3'
                    ])->label(false) ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <?= $form->field($model, 'ref_files_id')->dropDownList([
                        '3' => 'Профессора',
                        '4' => 'Ассоциативный профессор'
                    ], ['prompt'=>'Выберите тип', 'class' => 'form-select'])->label('Тип файлов') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'language_file')->dropDownList([
                        'kz' => 'Казахский',
                        'ru' => 'Русский',
                        'en' => 'Английский'
                    ], ['class' => 'form-select'])->label('Язык файла') ?>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'files[]')->fileInput([
                        'class' => 'form-control',
                        'multiple' => true,
                        'accept' => 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ])->label('Загрузите файлы (PDF или Word)') ?>
                </div>
            </div>

            <div class="d-grid">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
