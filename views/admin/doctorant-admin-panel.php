<?php
use app\models\DissertationAdvice;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\AuthorForm $model */
?>

<h1>Добавить автора</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'full_name_ru')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'full_name_kz')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'full_name_en')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'dissertation_id')->dropDownList(
    ArrayHelper::map(DissertationAdvice::find()->orderBy('name')->all(), 'id', 'name'),
    ['prompt' => 'Выберите диссовет']
) ?>


<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>