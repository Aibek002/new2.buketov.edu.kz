<?php
use app\assets\DissertationAdviceAdminAsset;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

DissertationAdviceAdminAsset::register($this);
?>
<div class="p-5 my-5">
    <input type="text" class="search-doctorant form-control" placeholder="Поиск по фамилию...">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'staff_id')->radioList([], ['class' => 'staff-radio-list']) ?>
    <?= $form->field($model, 'files[]')->fileInput(['class' => 'files', 'multiple' => true, 'accept' => 'application/pdf', 'placeholder' => 'Выберите файлы докторантов'])->label(false) ?>
    <?= $form->field($model, 'language_file')->dropDownList(['kz' => 'kz', 'ru' => 'ru', 'en' => 'en']) ?>
    <!-- <div class="container-input-name">

    </div> -->
    <?= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>