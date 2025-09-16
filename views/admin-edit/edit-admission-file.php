<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Документы Приемная комиссий</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($model as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><?= Html::decode($item['name_url']) ?></span>
                    <?= Html::a(
                        '✏️ Редактировать',
                        ['admin-edit/edit-form-admission-file', 'id' => $item['id']],
                        ['class' => 'btn btn-sm btn-outline-primary']
                    ) ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>