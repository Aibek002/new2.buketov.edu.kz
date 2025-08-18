<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RefStaff;
use app\models\Faculty;
use app\models\Departament;

$this->title = 'Управлять Персоналом';
?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3']]); ?>

            <!-- ФИО -->
            <div class="col-md-4">
                <?= $form->field($model, 'surname_kz')->textInput(['maxlength' => true])->label('Фамилия (KZ)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'surname_ru')->textInput(['maxlength' => true])->label('Фамилия (RU)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'surname_en')->textInput(['maxlength' => true])->label('Фамилия (EN)') ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true])->label('Имя (KZ)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true])->label('Имя (RU)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'name_en')->textInput(['maxlength' => true])->label('Имя (EN)') ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'patronymic_kz')->textInput(['maxlength' => true])->label('Отчество (KZ)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'patronymic_ru')->textInput(['maxlength' => true])->label('Отчество (RU)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'patronymic_en')->textInput(['maxlength' => true])->label('Отчество (EN)') ?>
            </div>

            <!-- Контактная информация -->
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>

            <!-- Информация -->
            <div class="col-md-12">
                <?= $form->field($model, 'information_kz')->textarea(['rows' => 3])->label('Информация (KZ)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'information_ru')->textarea(['rows' => 3])->label('Информация (RU)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'information_en')->textarea(['rows' => 3])->label('Информация (EN)') ?>
            </div>

            <!-- Приветствие -->
            <div class="col-md-12">
                <?= $form->field($model, 'welcome_kz')->textarea(['rows' => 3])->label('Приветствие (KZ)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'welcome_ru')->textarea(['rows' => 3])->label('Приветствие (RU)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'welcome_en')->textarea(['rows' => 3])->label('Приветствие (EN)') ?>
            </div>

            <!-- Должности -->
            <div class="col-md-12">
                <?= $form->field($model, 'job_title_kz')->textarea(['rows' => 2])->label('Должность (KZ)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'job_title_ru')->textarea(['rows' => 2])->label('Должность (RU)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'job_title_en')->textarea(['rows' => 2])->label('Должность (EN)') ?>
            </div>

            <!-- Справочные поля -->
            <div class="col-md-4">
                <?= $form->field($model, 'ref_staff_id')->dropDownList(
                    ArrayHelper::map(RefStaff::find()->all(), 'id', 'type'),
                    ['prompt' => 'Выберите должность']
                ) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'faculty_id')->dropDownList(
                    ArrayHelper::map(Faculty::find()->orderBy('name_ru')->all(), 'id', 'name_ru'),
                    ['prompt' => 'Выберите факультет']
                ) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'departament_id')->dropDownList(
                    ArrayHelper::map(Departament::find()->orderBy('name_ru')->all(), 'id', 'name_ru'),
                    ['prompt' => 'Без кафедры']
                ) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'faculty_show')->checkbox(['label' => 'Показать факультет']) ?>
                <?= $form->field($model, 'dissertation_show')->checkbox(['label' => 'Показать диссертацию']) ?>

            </div>
            <!-- Кнопка -->
            <div class="col-12 text-end mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>