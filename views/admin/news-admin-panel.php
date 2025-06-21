<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin() ?>
<div class="p-5 my-5">
    <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'content_kz')->textarea(['rows' => 10]); ?>
    <?= $form->field($model, 'content_ru')->textarea(['rows' => 10]); ?>
    <?= $form->field($model, 'content_en')->textarea(['rows' => 10]); ?>
    <?= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end() ?>