<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">История департаментов</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($history as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
         
                    <span class="fw-bold"><?= str_replace(['ПОДРОБНАЯ ИНФОРМАЦИЯ О КАФЕДРЕ'],"КАФЕДРА ", Html::encode($item['title'])) ?></span>
                    <?= Html::a('✏️ Редактировать', 
                        ['admin-edit/edit-form-departament', 'id' => $item['id']], 
                        ['class' => 'btn btn-sm btn-outline-primary']
                    ) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
