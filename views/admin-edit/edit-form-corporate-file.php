<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Редактирование файла корпоративного управления</h5>
        </div>
        <div class="card-body p-4">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row g-4">
                <div class="col-md-4">
                    <?= $form->field($model, 'ref_corporate_governance')
                        ->dropDownList(
                            ArrayHelper::map($type_corporate, 'id', 'type'),
                            [
                                'prompt' => 'Выберите раздел корпоративного управления',
                                'class' => 'form-select type_corporate'
                            ]
                        )
                        ->label('Раздел') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'name_url')
                        ->textInput(['class' => 'form-control', 'placeholder' => 'Введите название'])
                        ->label('Название (URL)') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'sort_id')
                        ->dropDownList([], [
                            'prompt' => 'Выберите год',
                            'class' => 'form-select sort_id',
                            'disabled' => false
                        ])
                        ->label('Год') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'language_file')
                        ->dropDownList(
                            ArrayHelper::map($language, 'language_file', 'language_file'),
                            [
                                'prompt' => 'Выберите язык',
                                'class' => 'form-select years',
                                'disabled' => false
                            ]
                        )
                        ->label('Язык файла') ?>
                </div>

                <div class="col-md-8">
                    <?= $form->field($model, 'file')
                        ->fileInput([
                            'class' => 'form-control',
                            'accept' => 'application/pdf',
                            'placeholder' => 'Выберите файл'
                        ])
                        ->label('Файл (PDF)') ?>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <?= Html::submitButton('💾 Сохранить', ['class' => 'btn btn-success px-4']) ?>
                <?= Html::a('↩ Назад', ['index'], ['class' => 'btn btn-secondary ms-2 px-4']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const type_corporate = document.querySelector('.type_corporate');
        const sort_id = document.querySelector('.sort_id');
        fetch(`/yii2/web/index.php?r=ajax/get-sort-id&type_corporate=${type_corporate.value}`)
            .then(responce => responce.json())
            .then(data => {
                sort_id.innerHTML = `<option value="">--- Выберите порядок сортировки ---</option>`;
                data.forEach(element => {
                    const isSelected = element.sort_id == "<?= $model->sort_id ?>" ? "selected" : "";

                    sort_id.innerHTML += `
                    <option value="${element.sort_id}" ${isSelected}>
                        ${element.sort_id}
                     </option>
            `;
                });
            })
            .catch(error => console.error('Ошибка запроса:', error));
    });
</script>