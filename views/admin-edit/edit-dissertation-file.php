<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\DissertationAdviceAdminEditAsset;
DissertationAdviceAdminEditAsset::register($this);
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
            <label for="doctorant">Докторанты:</label>
            <select id="doctorant" class="form-select mb-3" disabled>
                <option value="">-- Выберите --</option>
            </select>
            <label for="doctorant">Документы Докторанта:</label>
            <select id="doctorant_doc" class="form-select mb-3" disabled>
                <option value="">-- Выберите --</option>
            </select>
            <button id="result" disabled>Изменить</button>
        </div>
    </div>
</div>
</div>

