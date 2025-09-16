<?php

use app\models\DissertationAdvice;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RefStaff;
use app\models\Faculty;
use app\models\Departament;
use app\assets\StaffAsset;
StaffAsset::register($this);
$this->title = 'Управлять Персоналом';
?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3']]); ?>
            <div class="col-md-12">
                <?= $form->field($model, 'ref_staff_id')->dropDownList(
                    ArrayHelper::map(RefStaff::find()->all(), 'id', 'type'),
                    ['prompt' => 'Выберите должность', 'class' => 'ref_staff_id form-control']
                ) ?>
            </div>
            <!-- ФИО -->
            <div class="row fio p-2 g-3">
                <div class="col-md-4 ">
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
            </div>
            <div class="row contact p-2  g-3">
                <!-- Контактная информация -->
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row information p-2  g-3">
                <!-- Информация -->
                <div class="col-md-4">
                    <?= $form->field($model, 'information_kz')->textarea(['rows' => 3])->label('Информация (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'information_ru')->textarea(['rows' => 3])->label('Информация (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'information_en')->textarea(['rows' => 3])->label('Информация (EN)') ?>
                </div>
            </div>
            <div class="row welcome p-2  g-3">
                <!-- Приветствие -->
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_kz')->textarea(['rows' => 3])->label('Приветствие (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_ru')->textarea(['rows' => 3])->label('Приветствие (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_en')->textarea(['rows' => 3])->label('Приветствие (EN)') ?>
                </div>
            </div>
            <div class="row job-title p-2  g-3">
                <!-- Должности -->
                <div class="col-md-4">
                    <?= $form->field($model, 'job_title_kz')->textarea(['rows' => 2])->label('Должность (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'job_title_ru')->textarea(['rows' => 2])->label('Должность (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'job_title_en')->textarea(['rows' => 2])->label('Должность (EN)') ?>
                </div>
            </div>

            <!-- Справочные поля -->
            <div class="row faculty p-2  g-3">
                <div class="col-md-13">
                    <?= $form->field($model, 'faculty_id')->dropDownList(
                        ArrayHelper::map(Faculty::find()->orderBy('name_ru')->all(), 'id', 'name_ru'),
                        ['prompt' => 'Выберите факультет']
                    ) ?>
                </div>
            </div>
            <div class="row  departament p-2  g-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'departament_id')->dropDownList(
                        ArrayHelper::map(Departament::find()->orderBy('name_ru')->all(), 'id', 'name_ru'),
                        ['prompt' => 'Без кафедры']
                    ) ?>
                </div>
            </div>
            <div class="row  dissertation p-2  g-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'dissertation_advice_id')->dropDownList(
                        ArrayHelper::map(DissertationAdvice::find()->orderBy('name')->all(), 'id', 'name'),
                        ['prompt' => 'Без  диссертации']
                    ) ?>
                </div>
            </div>
            <br />
            <div class="row  show p-2  g-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'faculty_show')->checkbox(['label' => 'Показать факультет']) ?>
                    <?= $form->field($model, 'dissertation_show')->checkbox(['label' => 'Показать диссертацию']) ?>
                </div>
            </div>
            <div class="row  date p-2  g-3">
                <div class="col-md-12">
                    <?= $form->field($model, 'date')->input('date')->label('Выбрать дату') ?>


                </div>
            </div>
            <div class="row upload-img p-2">
                <div class="col-md-12">
                    <?= $form->field($model, 'images')->fileInput(['accept' => '.jpg']) ?>
                </div>
            </div>
            <!-- Кнопка -->
            <div class="submit">
                <div class="col-12 text-end mt-3">
                    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success px-4']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>