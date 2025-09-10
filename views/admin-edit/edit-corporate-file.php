<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>

<?php $form = ActiveForm::begin(); ?>
<div class="row p-5">
    <div class="col-4">
        <?= $form->field($model, 'type_corporate')->dropDownList(ArrayHelper::map($type_corporate, 'id', 'type'), ['prompt' => 'Выберите тип Корпоративого управление', 'class' => 'type_corporate form-control'])->label(false) ?>
    </div>
    <div class="col-4">
        <?= $form->field($model, 'sort_id')->dropDownList([], ['prompt' => 'Выберите год', 'class' => 'sort_id form-control', 'disabled' => true])->label(false) ?>
    </div>

    <div class="col-4">
        <?= $form->field($model, 'file_for_change')->dropDownList(ArrayHelper::map($share_sole_holder_years, 'sort_id', 'sort_id'), ['prompt' => 'Выберите год', 'class' => 'files form-control', 'disabled' => true])->label(false) ?>
    </div>
    <div class="col-12">
        <?= Html::submitButton('✏️ Редактировать', ['class' => 'submit btn btn-success', 'disabled' => true]) ?>
    </div>

</div>



<?php ActiveForm::end() ?>
<script>
    const type_corporate = document.querySelector('.type_corporate');
    const sort_id = document.querySelector('.sort_id');
    const file_for_change = document.querySelector('.files');
    const submit = document.querySelector('.submit');
    type_corporate.addEventListener('change', () => {
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
        sort_id.disabled = false;
        sort_id.addEventListener('change', () => {
            file_for_change.disabled = false;

            fetch(`/yii2/web/index.php?r=ajax%2Fget-file-for-change&type_corporate=${type_corporate.value}&sort_id=${sort_id.value}`)
                .then(response => response.json())
                .then(data => {
                    file_for_change.innerHTML = '<option value="">--- Выберите файла ---</option>';
                    data.forEach(element => {
                        file_for_change.innerHTML += `
                              <option value="${element.id}">
                                    ${element.name_url} (${element.language_file})
                                </option>
                            `
                    });

                }).catch(error => console.error('Ошибка запроса:', error));
                
            file_for_change.addEventListener('change', () => {
                submit.disabled = false;
                submit.addEventListener('click', () => {
                    window.location.href = `/yii2/web/index.php?r=admin-edit/edit-form-corporate-file&id=${file_for_change.value}`
                });
            });
        });

    });

</script>