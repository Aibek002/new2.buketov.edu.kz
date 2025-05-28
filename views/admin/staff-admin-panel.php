<?php

use app\models\Departament;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RefStaff;
use app\models\Faculty;


/** @var yii\web\View $this */
/** @var app\models\Staff $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admin-panel p-5 my-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'surname_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'surname_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'patronymic_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'patronymic_en')->textInput(['maxlength' => true]) ?>


 

    <?= $form->field($model, 'information_kz')->textarea(['rows' => 4]) ?>
    <?= $form->field($model, 'information_ru')->textarea(['rows' => 4]) ?>
    <?= $form->field($model, 'information_en')->textarea(['rows' => 4]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])  ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])  ?>


       <?= $form->field($model, 'ref_staff_id')->dropDownList(
        ArrayHelper::map(RefStaff::find()->all(), 'id', 'type'),
        ['prompt' => 'Выберите должность']
    ) ?>
    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
        ['prompt' => 'Выберите факультет']
    ) ?>

    <?= $form->field($model, 'departament_id')->dropDownList(
        ArrayHelper::map(Departament::find()->all(), 'id', 'name'),
        ['prompt' => 'Без кафедры']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
