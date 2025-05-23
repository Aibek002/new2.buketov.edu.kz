<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Управлять Факультетами';
?>

<div class="admin-panel p-5 my-5">
    <h1><?= Html::encode($this->title); ?></h1>
    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model , 'name')->textInput(['maxlength' => true]);?>
    <?= $form->field($model , 'information')->textArea();?>
    <?= $form->field($model , 'welcome')->textArea();?>

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>
</div>
