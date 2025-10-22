<?php

use app\models\RefArticle;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use dosamigos\tinymce\TinyMce;
$this->title = Yii::t("app", "Управление с Информационными страницами");

?>
<div class="admin-panel p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php




    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title_kz')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <!-- <hello-->
    <?= $form->field($model, 'content_kz')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, "ref_article_id")->dropDownList(
        ArrayHelper::map(RefArticle::find()->asArray()->all(), "id", "type"),
        ['prompt' => 'выберите категорию']
    ) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?= $form->field($model, 'image')->fileInput(['accept' => '.jpg']); ?>
    <?php ActiveForm::end(); ?>


</div>