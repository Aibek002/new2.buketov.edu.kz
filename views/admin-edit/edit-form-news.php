<?php
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

            <!-- Заголовки -->
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'title_kz')->textInput(['class'=>'form-control'])->label('Заголовок (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_ru')->textInput(['class'=>'form-control'])->label('Заголовок (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'title_en')->textInput(['class'=>'form-control'])->label('Заголовок (EN)') ?>
                </div>
            </div>

            <!-- Контент -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'content_kz')->textarea(['rows'=>6, 'class'=>'form-control tinymce-editor'])->label('Контент (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'content_ru')->textarea(['rows'=>6, 'class'=>'form-control tinymce-editor'])->label('Контент (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'content_en')->textarea(['rows'=>6, 'class'=>'form-control tinymce-editor'])->label('Контент (EN)') ?>
                </div>
            </div>

            <!-- Дата -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'date')->input('date')->label('Дата') ?>
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
$this->registerJs("
    tinymce.init({
        selector: '.tinymce-editor',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        menubar: false,
        height: 250,
        language: 'ru'
    });
");
?>
