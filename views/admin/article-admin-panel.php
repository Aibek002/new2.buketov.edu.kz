<?php

use app\models\RefArticle;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
$this->title = Yii::t("app","Article");

?>
<div class="admin-panel p-5 m-5">
<?php




$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'content_kz')->widget(TinyMce::class, [
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

<?= $form->field($model, 'content_ru')->widget(TinyMce::class, [
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

<?= $form->field($model, 'content_en')->widget(TinyMce::class, [
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
<?= $form->field($model,"ref_article_id")->dropDownList(
    ArrayHelper::map(RefArticle::find()->asArray()->all(),"id","type"),
    ['prompt'=>'выберите категорию']
)?>
<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>


</div>