<?php
use app\models\Faculty;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\app\assets\AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Редактирование кафедры</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <!-- Названия -->
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'name_kz')->textInput(['class' => 'form-control'])->label('Название (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name_ru')->textInput(['class' => 'form-control'])->label('Название (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name_en')->textInput(['class' => 'form-control'])->label('Название (EN)') ?>
                </div>
            </div>

            <!-- Информация -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'information_kz')->textarea(['rows' => 10, 'class' => 'form-control tinymce-editor'])->label('Информация (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'information_ru')->textarea(['rows' => 10, 'class' => 'form-control tinymce-editor'])->label('Информация (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'information_en')->textarea(['rows' => 10, 'class' => 'form-control tinymce-editor'])->label('Информация (EN)') ?>
                </div>
            </div>

            <!-- Приветствие -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_kz')->textarea(['rows' => 6, 'class' => 'form-control'])->label('Приветствие (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_ru')->textarea(['rows' => 6, 'class' => 'form-control'])->label('Приветствие (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'welcome_en')->textarea(['rows' => 6, 'class' => 'form-control'])->label('Приветствие (EN)') ?>
                </div>
            </div>

            <!-- ID факультета -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'faculty_id')->dropDownList(
                        ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
                        ['prompt' => 'Выберите факультет']
                    ) ?>
                </div>
            </div>

            <!-- Кнопки -->
            <div class="form-group mt-4 text-end">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
                <?= Html::a('Отмена', ['admin-edit/edit-departament'], ['class' => 'btn btn-secondary ms-2']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script src="/tinymce/tinymce.min.js"></script>

<script>
tinymce.init({
    selector: '.tinymce-editor',
    base_url: '/tinymce',
    suffix: '.min',

    license_key: 'gpl',
    language: 'ru',
    height: 600,

    toolbar: 'bold italic underline | alignleft aligncenter alignright | bullist numlist',
    plugins: 'lists',

    formats: {
        hilitecolor: { inline: 'span', styles: {} }
    },

    setup: function (editor) {
        editor.on('GetContent', function (e) {
            e.content = e.content.replace(/background-color:[^;"]+;?/gi, '');
        });
    }
});
</script>
