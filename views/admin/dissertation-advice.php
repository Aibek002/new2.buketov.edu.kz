<?php
use app\assets\DissertationAdviceAdminAsset;
use app\models\DissertationAdvice;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;

DissertationAdviceAdminAsset::register($this);
?>
<div class="p-5 my-5">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'type')->dropDownList(['normative' => 'Нормативные Документы', 'doctorant' => 'Документы Докторанта'], ['prompt' => 'Выберите тип документа ', 'class' => 'form-control type'])->label(false) ?>
    <div class="doctorant">
        <input type="text" class="search-doctorant form-control" placeholder="Поиск по фамилию...">


        <?= $form->field($model, 'doctorant_id')->radioList([], ['class' => 'staff-radio-list'])->label(false) ?>
    </div>
    <?= $form->field($model, 'dissertation_advice_id')->dropDownList(
        ArrayHelper::map(DissertationAdvice::find()->orderBy('name')->all(), 'id', 'name'),
        ['prompt' => 'Выберите диссовет','class'=>'dissertation_advice']
    )->label(false) ?>
    <?= $form->field($model, 'files[]')->fileInput(['class' => 'files', 'multiple' => true, 'accept' => 'application/pdf', 'placeholder' => 'Выберите файлы докторантов'])->label(false) ?>
    <?= $form->field($model, 'language_file')->dropDownList(['kz' => 'kz', 'ru' => 'ru', 'en' => 'en'], ['class' => 'language_input'])->label(false) ?>
    <!-- <div class="container-input-name">

    </div> -->
    <?= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>