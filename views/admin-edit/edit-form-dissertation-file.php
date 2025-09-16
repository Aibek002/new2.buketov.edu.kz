<?php
use app\models\DissertationAdvice;
use app\models\Doctorant;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Html;
print_r($model->attributes);
?>

<div class="p-5 my-5">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'ref_files_id')->dropDownList(['2' => 'Нормативные Документы', '1' => 'Документы Докторанта'], ['prompt' => 'Выберите тип документа ', 'class' => 'form-control type'])->label(false) ?>
    <?php
    if ($doctorant !== null):
        ?>
        <?= $form->field($model, 'doctorant_id')->dropDownList(
            ArrayHelper::map($doctorant, 'id', 'full_name_ru'),
            ['prompt' => 'Выберите докторанта', 'class' => 'doctorant']
        )->label(false) ?>

    <?php endif ?>
    <?= $form->field($model, 'dissertation_advice_id')->dropDownList(
        ArrayHelper::map(
            DissertationAdvice::find()
                ->orderBy('name')
                ->all(),
            'id',
            'name'
        ),
        ['prompt' => 'Выберите диссовет', 'class' => 'dissertation_advice']
    )->label(false) ?>
    <?= $form->field($model, 's_file')->fileInput(['class' => 'file', 'accept' => 'application/pdf', 'placeholder' => 'Выберите файлы докторантов'])->label(false) ?>
    <?= $form->field($model, 'language_file')->dropDownList(['kz' => 'kz', 'ru' => 'ru', 'en' => 'en'], ['class' => 'language_input'])->label(false) ?>
    <!-- <div class="container-input-name">

    </div> -->
    <?= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>
