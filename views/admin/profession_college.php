<?php

use app\models\Profession;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


$this->title = 'Управлять Истории Факультетов';
?>

<div class="admin-panel  p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'special_code')->textInput(['maxlength' => true]) ?>

 
    <?= $form->field($model, 'profession_id')->dropDownList(
        ArrayHelper::map(Profession::find()->all(), 'id', 'name_ru'),
        ['prompt' => 'Выберите профессию с вуза']
    ) ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end(); ?>

</div>