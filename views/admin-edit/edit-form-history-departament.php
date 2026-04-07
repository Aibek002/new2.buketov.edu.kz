<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\app\assets\AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\HistoryDepartament */
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Редактирование истории кафедры</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'title_kz')->textInput(['class'=>'form-control'])->label('Название (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_ru')->textInput(['class'=>'form-control'])->label('Название (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_en')->textInput(['class'=>'form-control'])->label('Название (EN)') ?>
                </div>
            </div>

            <div class="row row-column mt-3">
                <div class="col-md-12 ">
                    <?= $form->field($model, 'content_kz')->textarea(['rows' => 12, 'class'=>'form-control tinymce-editor'])->label('Описание (KZ)') ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'content_ru')->textarea(['rows' => 12 , 'class'=>'form-control tinymce-editor'])->label('Описание (RU)') ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'content_en')->textarea(['rows' => 12, 'class'=>'form-control tinymce-editor'])->label('Описание (EN)') ?>
                </div>
            </div>

            <div class="form-group mt-4 text-end">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
                <?= Html::a('Отмена', ['admin-edit/edit-history-departament'], ['class'=>'btn btn-secondary ms-2']) ?>
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
