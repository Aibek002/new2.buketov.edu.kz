<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; 

use app\assets\ApplicantAsset;
ApplicantAsset::register($this);
?>

<?php $form = ActiveForm::begin(); ?>
<input class="search-applicant-professor form-control" placeholder="Поиск по фамилию...">
<?= $form->field($model, 'professor_id')->radioList([], ['class' => 'staff-radio-list'])->label(false) ?>
<?= $form->field($model, 'ref_files_id')->dropDownList(['3' => 'Профессора', '4' => 'Ассоциативный Профессора'],['prompt'=>'Выберите тип'])->label(false) ?>
<?= $form->field($model, 'files[]')->fileInput(['class' => 'files', 'multiple' => true,  'accept' => 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'placeholder' => 'Выберите файл']) ?>

<?= $form->field($model, 'language_file')->dropDownList(['kz' => 'kz', 'ru' => 'ru', 'en' => 'en'], ['class' => 'language_input'])->label(false) ?>
<?= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>