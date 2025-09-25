<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SmiAboutUs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="smi-about-us-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3>Қазақша</h3>
    <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content_kz')->textarea(['rows' => 6]) ?>

    <h3>Русский</h3>
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <h3>English</h3>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
