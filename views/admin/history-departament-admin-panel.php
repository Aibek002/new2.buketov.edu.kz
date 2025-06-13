<?php

use app\models\Departament;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Управлять Истории Факультетов';
?>

<div class="admin-panel  p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content_kz')->textarea(['rows' => 10]) ?>
    <?= $form->field($model, 'content_ru')->textarea(['rows' => 10]) ?>
    <?= $form->field($model, 'content_en')->textarea(['rows' => 10]) ?>
 
    <?= $form->field($model, 'departament_id')->dropDownList(
        ArrayHelper::map(Departament::find()->all(), 'id', 'name_ru'),
        ['prompt' => 'Выберите Кафедров']
    ) ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>

</div>