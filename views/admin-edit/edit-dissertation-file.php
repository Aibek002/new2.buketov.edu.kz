<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Документы Диссертационного совета</h4>
        </div>
        <div class="card-body">
            <!-- 1. Выбор совета -->
            <label for="council">Выберите совет:</label>
            <select id="council" class="form-select mb-3">
                <option value="">-- Выберите --</option>
                <?php foreach ($councils as $council): ?>
                    <option value="<?= $council['id'] ?>"><?= Html::encode($council['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <!-- 2. Тип документов -->
            <label for="docType">Тип документов:</label>
            <select id="docType" class="form-select mb-3" disabled>
                <option value="">-- Выберите --</option>
                <option value="2">Нормативные документы</option>
                <option value="1">Документы докторантов</option>
            </select>
            <label for="normative_doc">Тип документов:</label>
            <select id="normative_doc" class="form-select mb-3" disabled>
                <option value="">-- Выберите --</option>

            </select>

            <button id="result" disabled>Изменить</button>
        </div>
    </div>
</div>
</div>

<script>
    const dis_advice = document.querySelector('#council');
    const type_doc = document.querySelector('#docType');
    const normative_doc = document.querySelector('#normative_doc');
    const doctorant = document.querySelector('#doctorant');
    const btn_redirect = document.querySelector('#result');


    dis_advice.addEventListener('change', () => {
        type_doc.removeAttribute("disabled");
        const diss_id = dis_advice.value;
        console.log(dis_advice.value);
        type_doc.addEventListener('change', () => {
            if (type_doc.value == 2) {
                fetch(`/yii2/web/index.php?r=ajax/get-normative-docs&diss_id=${dis_advice.value}`)
                    .then(response => response.json())
                    .then(data => {
                        normative_doc.innerHTML = `<option value="">Выберите документ</option>`; // очищаем
                        data.forEach(element => {
                            normative_doc.innerHTML += `
                            <option value="${element.id}">
                                ${element.fileName + "(" + element.language_file + ")"}
                            </option>`
                        });
                    })
                    .catch(err => console.error("Ошибка загрузки:", err));
                normative_doc.removeAttribute('disabled');
                normative_doc.addEventListener('change', () => {
                    btn_redirect.removeAttribute('disabled');
                    btn_redirect.addEventListener('click',()=>{
                        window.location.href = `/yii2/web/index.php?r=admin-edit/edit-form-dissertation-file&id=${normative_doc.value}`
                    })
                })
            } else if (type_doc == 1) {

            }
            console.log(type_doc.value);
        });
    })
</script>