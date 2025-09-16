<?php
use app\models\Profession;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
\app\assets\AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\FullText */
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Редактирование записи (Полные тексты)</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <!-- Названия -->
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'name_kz')->textInput(['class' => 'form-control'])->label('Название (KZ)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name_ru')->textInput(['class' => 'form-control'])->label('Название (RU)') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name_en')->textInput(['class' => 'form-control'])->label('Название (EN)') ?>
                </div>
            </div>

            <!-- Специальный код -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'special_code')->textInput(['class' => 'form-control'])->label('Специальный код') ?>
                </div>
            </div>

            <!-- Профессия -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <?= $form->field($model, 'profession_id')->dropDownList(
                        ArrayHelper::map(Profession::find()->all(), 'id', 'name_ru'),
                        ['prompt' => 'Выберите профессию']
                    )->label('Профессия') ?>
                </div>
            </div>

            <!-- Кнопки -->
            <div class="form-group mt-4 text-end">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
                <?= Html::a('Отмена', ['admin-edit/edit-profession-college'], ['class' => 'btn btn-secondary ms-2']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
