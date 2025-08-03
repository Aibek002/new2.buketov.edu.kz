<?php

use app\models\RefArticle;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html; ?>
<div class="p-5 my-5">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'ref_article_id')->dropDownList(
        ArrayHelper::map(RefArticle::find()->asArray()->all(), 'id', 'type')
    ) ?>
    <?= $form->field($model, 'images')->fileInput(['multiple' => true]) ?>

    <?= Html::submitButton('submit', ['class' => 'btn btn-success']); ?>
    <?php ActiveForm::end() ?>
</div>