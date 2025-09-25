<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Все сообщении</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($messages as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><?= Html::decode($item['title']) ?></span>
                    <div class="d-flex gap-3">
                        <?= Html::a(
                            '✏️ Ответить',
                            ['admin/answer-feedback', 'id' => $item['id']],
                            ['class' => 'btn btn-sm btn-outline-primary']
                        ) ?>
                        <?= Html::a(
                            '👁 Показать',
                            ['admin/show-feedback', 'id' => $item['id']],
                            ['class' => 'btn btn-sm btn-outline-primary']
                        ) ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>