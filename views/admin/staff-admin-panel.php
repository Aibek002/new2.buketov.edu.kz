<?php

use app\models\Departament;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\RefStaff;
use app\models\Faculty;
use dosamigos\tinymce\TinyMce;


/** @var yii\web\View $this */
/** @var app\models\Staff $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class=" p-5 my-5">

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


 

    <?= $form->field($model, 'information_kz')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'information_ru')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'information_en')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'welcome_kz')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'welcome_ru')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'welcome_en')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'job_title_kz')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'job_title_ru')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
<?= $form->field($model, 'job_title_en')->widget(TinyMce::class, [
    'options' => ['rows' => 10],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table paste code help wordcount"
        ],
        'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code"
    ]
]); ?>
    
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
