<?php

use yii\bootstrap5\ActiveForm; 
use yii\helpers\Html;?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'full_name_ru')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'full_name_kz')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'full_name_en')->textInput(['maxlength' => true]) ?>
<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end() ?>