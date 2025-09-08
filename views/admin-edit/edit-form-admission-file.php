<?php

use app\models\AdmissionPdf;
use app\models\RefSortOrderAdmissionPdf;
use app\models\SkillLevel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


use yii\bootstrap5\ActiveForm;

$this->title = Yii::t("app", "Управление с ПДФами с Приемной комиссий");
$lang = Yii::$app->language;
?>
<div class="admin-panel p-5 m-5">
    <h1><?= Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($models, 'name_url')->textInput(['maxlength' => true, 'placeholder' => 'название ссылки пдфа']) ?>
    <?= $form->field($models, 'skill_level_id')->dropDownList(
        ArrayHelper::map(
            SkillLevel::find()->asArray()->all(),
            'id',
            "type_$lang"
        ),
        ['prompt' => 'Выберите категорию квалификации!']
    ); ?>
    <?= $form->field($models, 'ref_sort_order_id')->dropDownList(
        ArrayHelper::map(
            RefSortOrderAdmissionPdf::find()->asArray()->all(),
            'id',
            "type_$lang"
        ),
        ['prompt' => 'Выберите порядок сортировки!']
    ) ?>
    <?= $form->field($models, 'lang_pdf')->dropDownList(
        [
            'kz' => 'Қазақша',
            'ru' => 'Русский',
            'en' => 'English',
        ],
        ['prompt' => 'Выберите язык']
    ) ?>


    <?= $form->field($models, 'replace_file_id')->dropDownList(
        ArrayHelper::map(
            AdmissionPdf::find()->where(['archive' => 0])->asArray()->orderBy('ref_sort_order_id')->all(),
            'id',
            'name_url'
        ),
        ['prompt' => 'Выберите файл, который хотите заменить (если нужно)']
    ) ?>

    <?= $form->field($models, 'file')->fileInput(['multiple' => false]) ?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end() ?>