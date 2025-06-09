<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Управлять Факультетами';
?>

<div class="admin-panel p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model , 'name_kz')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'name_ru')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'name_en')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'information_kz')->textarea(['rows' => 10]);?>
    <?= $form->field($model , 'information_ru')->textarea(['rows' => 10]);?>
    <?= $form->field($model , 'information_en')->textarea(['rows' => 10]);?>
    <?= $form->field($model , 'welcome_kz')->textarea(['rows' => 10]);?>
    <?= $form->field($model , 'welcome_ru')->textarea(['rows' => 10]);?>
    <?= $form->field($model , 'welcome_en')->textarea(['rows' => 10]);?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>
</div>
