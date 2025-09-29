<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">История факультетов</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($history as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
         
                    <span class="fw-bold"><?= str_replace(['ПОДРОБНАЯ ИНФОРМАЦИЯ О '],"", Html::decode($item['title'])) ?></span>
                    <?= Html::a('✏️ Редактировать', 
                        ['admin-edit/edit-form-history-faculty', 'id' => $item['id']], 
                        ['class' => 'btn btn-sm btn-outline-primary']
                    ) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
