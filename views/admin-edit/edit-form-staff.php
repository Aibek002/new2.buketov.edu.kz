<?php
use app\models\Departament;
use app\models\DissertationAdvice;
use app\models\Faculty;
use app\models\RefStaff;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\app\assets\AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\FullText */
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Редактирование полного текста</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <!-- ФИО -->
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($staff, 'surname_kz')->textInput()->label('Фамилия (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'surname_ru')->textInput()->label('Фамилия (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'surname_en')->textInput()->label('Фамилия (EN)') ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($staff, 'name_kz')->textInput()->label('Имя (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'name_ru')->textInput()->label('Имя (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'name_en')->textInput()->label('Имя (EN)') ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($staff, 'patronymic_kz')->textInput()->label('Отчество (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'patronymic_ru')->textInput()->label('Отчество (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($staff, 'patronymic_en')->textInput()->label('Отчество (EN)') ?>
                </div>
            </div>

            <!-- Контакты -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <?= $form->field($type_ref_staff, 'email')->input('email')->label('Email') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($type_ref_staff, 'phone')->textInput()->label('Телефон') ?>
                </div>
            </div>

            <!-- Информация -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'information_kz')->textarea(['rows' => 5, 'class' => 'tinymce-editor'])->label('Информация (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'information_ru')->textarea(['rows' => 5, 'class' => 'tinymce-editor'])->label('Информация (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'information_en')->textarea(['rows' => 5, 'class' => 'tinymce-editor'])->label('Информация (EN)') ?>
                </div>
            </div>

            <!-- Приветствие -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'welcome_kz')->textarea(['rows' => 4])->label('Приветствие (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'welcome_ru')->textarea(['rows' => 4])->label('Приветствие (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'welcome_en')->textarea(['rows' => 4])->label('Приветствие (EN)') ?>
                </div>
            </div>

            <!-- Должность -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'job_title_kz')->textInput()->label('Должность (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'job_title_ru')->textInput()->label('Должность (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'job_title_en')->textInput()->label('Должность (EN)') ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <?= $form->field($staff, 'images')->fileInput(['accept' => '.jpg']) ?>
                </div>
            </div>
            <!-- Связанные поля -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'faculty_id')->dropDownList(
                        ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
                        ['prompt' => 'Выберите факультет']
                    ) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'departament_id')->dropDownList(
                        ArrayHelper::map(Departament::find()->all(), 'id', 'name_ru'),
                        ['prompt' => 'Выберите кафедру']
                    ) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($type_ref_staff, 'ref_staff_id')
                        ->dropDownList(
                            ArrayHelper::map(RefStaff::find()->all(), 'id', 'type')
                        )->label('Ссылка на сотрудника (ID)') ?>
                </div>
            </div>



            <!-- Совет по диссертации -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <?= $form->field($type_ref_staff, 'dissertation_advice_id')->dropDownList(
                        ArrayHelper::map(DissertationAdvice::find()->all(), 'id', 'name'),
                        ['prompt' => 'Выберите совет']
                    )->label('Совет по диссертации') ?>
                </div>
            </div>

            <!-- Кнопки -->
            <div class="form-group mt-4 text-end">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
                <?= Html::a('Отмена', ['admin-edit/index'], ['class' => 'btn btn-secondary ms-2']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php

$this->registerJsFile('https://cdn.tiny.cloud/1/dh851zzc2lhniwdysf0p1ckjsj3ex5zf5ssp8jvaru77qzk6/tinymce/7/tinymce.min.js', [
    'referrerpolicy' => 'origin'
]);


$this->registerJs("
    tinymce.init({
        selector: '.tinymce-editor',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        menubar: false,
        height: 250,
        language: 'ru',
        apiKey: 'dh851zzc2lhniwdysf0p1ckjsj3ex5zf5ssp8jvaru77qzk6',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });

    $('form').on('submit', function() {
        tinymce.triggerSave();
    });
");
