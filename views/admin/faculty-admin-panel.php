<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Управлять Факультетами';
?>

<div class="admin-panel p-5 my-5">
    <h1><?= Html::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model , 'name_kz')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'name_ru')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'name_en')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'information_kz')->textArea();?>
    <?= $form->field($model , 'information_ru')->textArea();?>
    <?= $form->field($model , 'information_en')->textArea();?>
    <?= $form->field($model , 'welcome_kz')->textArea();?>
    <?= $form->field($model , 'welcome_ru')->textArea();?>
    <?= $form->field($model , 'welcome_en')->textArea();?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>
</div>
