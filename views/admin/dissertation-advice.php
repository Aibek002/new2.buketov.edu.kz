<?php
use app\assets\DissertationAdviceAdminAsset;
use yii\bootstrap5\ActiveForm;

DissertationAdviceAdminAsset::register($this);
?>
<div class="p-5 my-5">
    <input type="text" class="search-doctorant form-control" placeholder="Поиск по фамилию...">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'staff_id')->radioList([], ['class'=>'staff-radio-list']) ?>

    <?php ActiveForm::end(); ?>
</div>
