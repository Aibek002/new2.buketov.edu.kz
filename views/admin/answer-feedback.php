<?php $form = ActiveForm::begin([
    'options' => ['class' => 'feedback-form']
]) ?>


<div class="mt-3">
    <?= $form->field($model, 'title')->textInput([
        'class' => 'form-control form-control-lg',
        'placeholder' => Yii::t('app', 'Title'),
    ])->label(false) ?>
</div>

<div class="mt-3">
    <?= $form->field($model, 'message')->textarea([
        'class' => 'form-control form-control-lg',
        'placeholder' => Yii::t('app', 'Message'),
        'rows' => 5
    ])->label(false) ?>
</div>

<div class="mt-4">
    <?= Html::submitButton(
        Yii::t('app', 'Отправить'),
        ['class' => 'submitButton btn-lg w-100']
    ); ?>
</div>

<?php ActiveForm::end() ?>