<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Управление данными Докторантов</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($model as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
         
                    <span class="fw-bold"><?= $item['full_name_ru']?></span>
                    <?= Html::a('✏️ Редактировать', 
                        ['admin-edit/edit-form-doctorant', 'id' => $item['id']], 
                        ['class' => 'btn btn-sm btn-outline-primary']
                    ) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
