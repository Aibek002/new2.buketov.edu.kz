<?php use yii\helpers\Html; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Сотрудники</h4>
        </div>
        <div class="list-group list-group-flush">
            <?php foreach ($model as $item): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">

                    <span class="fw-bold">
                        <?= str_replace(
                            ['КАФЕДРА '],
                            '',
                            $item['surname'] . ' ' . $item['name'] . ' ' . $item['patronymic']
                        ) ?>
                        (<?= $item['job_title'] ?>)
                    </span>

                    <div class="d-flex gap-2">
                        <?= Html::a(
                            '✏️ Редактировать',
                            [
                                'admin-edit/edit-form-staff',
                                'id' => $item['staff_id'],
                                'type_ref_staff_id' => $item['type_ref_staff_id'],
                                'ref_staff_id' => $item['ref_staff_id']
                            ],
                            ['class' => 'btn btn-sm btn-outline-primary']
                        ) ?>

                        <?= Html::a(
                            '🗑 Удалить',
                            ['admin-edit/delete-staff', 'type_ref_staff_id' => $item['type_ref_staff_id']],
                            [
                                'class' => 'btn btn-sm btn-outline-danger',
                                'data-method' => 'post',
                                'data-confirm' => 'Вы уверены, что хотите удалить этого сотрудника?'
                            ]
                        ) ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>