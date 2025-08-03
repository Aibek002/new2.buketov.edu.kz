<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>
<div class="p-5 my-5">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, "username")->textInput(); ?>
    <?= $form->field($user, "email")->textInput(); ?>
    <?= $form->field($user, "password_hash")->passwordInput(); ?>
    <?= $form->field($user, "submitPassword")->passwordInput(); ?>
    <?= $form->field($user, 'role')->dropDownList([
        'admissionAdmin' => 'Admin (Admission)',
        'admissionEditor' => 'Editor (Admission)',
        'pressServiceAdmin' => 'Admin (Press Service)',
        'pressServiceEditor' => 'Editor (Press Service)',
        'corporateAdmin' => 'Admin (Corporate)',
        'corporateEditor' => 'Editor (Corporate)',
    ], ['prompt' => 'Выберите роль']) ?>

    <?= Html::submitButton("Зарегистрироваться", ['class' => "btn btn-success"]) ?>

    <?php ActiveForm::end(); ?>
</div>