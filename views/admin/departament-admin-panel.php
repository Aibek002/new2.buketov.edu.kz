<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Faculty;

$this->title = 'Управлять Кафедрами';
?>

<div class="admin-panel  p-5 m-5">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'information_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'information_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'information_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'welcome_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'welcome_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'welcome_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
        ['prompt' => 'Выберите факультет']
    ) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end();?>

</div>