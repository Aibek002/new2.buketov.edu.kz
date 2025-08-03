<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

?>
<div class="p-5 my-5">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, "username")->textInput() ?>
    <?= $form->field($user, "password_hash")->passwordInput(); ?>
    <?= Html::submitButton("Авторизоваться", ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end() ?>
</div>