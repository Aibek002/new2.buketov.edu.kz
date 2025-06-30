<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Faculty;

$this->title = 'Управлять Истории Факультетов';
?>

<div class="container my-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title); ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-4']]); ?>

            <div class="col-md-4">
                <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true, 'placeholder' => 'Атауы (қаз)'])->label('Заголовок (KZ)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true, 'placeholder' => 'Название (рус)'])->label('Заголовок (RU)') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'title_en')->textInput(['maxlength' => true, 'placeholder' => 'Title (EN)'])->label('Заголовок (EN)') ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'content_kz')->textarea(['rows' => 5, 'placeholder' => 'Контент на казахском'])->label('Контент (KZ)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'content_ru')->textarea(['rows' => 5, 'placeholder' => 'Контент на русском'])->label('Контент (RU)') ?>
            </div>
            <div class="col-md-12">
                <?= $form->field($model, 'content_en')->textarea(['rows' => 5, 'placeholder' => 'Content in English'])->label('Контент (EN)') ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'faculty_id')->dropDownList(
                    ArrayHelper::map(Faculty::find()->all(), 'id', 'name_ru'),
                    ['prompt' => 'Выберите факультет']
                )->label('Факультет') ?>
            </div>

            <div class="col-md-6 d-flex align-items-end justify-content-end">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
