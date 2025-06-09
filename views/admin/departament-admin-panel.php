<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Faculty;

$this->title = 'Управлять Кафедрами';
?>

<div class="admin-panel  p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'information_kz')->textarea(['rows' => 10]) ?>
    <?= $form->field($model, 'information_ru')->textarea(['rows' => 10]) ?>
    <?= $form->field($model, 'information_en')->textarea(['rows' => 10]) ?>
    <?= $form->field($model, 'welcome_kz')->textarea(['rows' => 10]); ?>
    <?= $form->field($model, 'welcome_ru')->textarea(['rows' => 10]); ?>
    <?= $form->field($model, 'welcome_en')->textarea(['rows' => 10]); ?>
    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
        ['prompt' => 'Выберите факультет']
    ) ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>

</div>