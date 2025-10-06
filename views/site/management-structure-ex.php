<?php
use app\components\LanguageHelper;
use yii\helpers\HtmlPurifier;
use app\assets\ManagmentStructureAsset;
ManagmentStructureAsset::register($this);
$this->title = Yii::t("app", "Management Structure");
?>
<div class="title-block">
    <?php echo Yii::t('app', $type) ?>
</div>
<div class="d-flex flex-column gap-2 col-md-12 p-5">
    <?php if ($model): ?>
        <?php foreach ($model as $index => $model_item): ?>

            <button class="button_collapse btn btn-primary d-flex justify-content-between" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapse_<?= $model_item->id ?>" aria-expanded="false"
                aria-controls="collapse_<?= $model_item->id ?>">
                <span><?= htmlspecialchars($model_item->{LanguageHelper::job_title()}) ?: 'Нет данных о должности' ?></span>
                <span>+</span>
            </button>


            <div class="collapse" id="collapse_<?= $model_item->id ?>">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <div class="row g-4 align-items-center">
                            <!-- Левая колонка с фото -->
                            <div class="col-md-3 text-center">
                                <img src="<?= $model_item->image->image ?? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>"
                                    alt="Фото" class="img-fluid rounded-circle shadow-sm mb-3"
                                    style="width: 200px; height: 200px; object-fit: contain;">
                                <h5 class="fw-bold mb-1">
                                    <?= $model_item->{LanguageHelper::surname()} . ' ' . $model_item->{LanguageHelper::name()} . ' ' . $model_item->{LanguageHelper::patronymic()} ?>
                                </h5>
                                <p class="text-muted small mb-2">
                                    <?= $model_item->{LanguageHelper::job_title()} ?: 'Нет данных о должности' ?>
                                </p>
                                <div class="text-center small">
                                    <p class="mb-1"><i class="bi bi-envelope"></i>
                                        <?= $model_item->email ?: 'Нет данных о email' ?></p>
                                    <p><i class="bi bi-telephone"></i> <?= $model_item->phone ?: 'Нет данных о phone' ?></p>
                                </div>
                            </div>

                            <!-- Правая колонка с информацией -->
                            <div class="col-md-9">
                                <h5 class="fw-semibold text-primary mb-3"><?=Yii::t('app','Information')?></h5>
                                <div class="info p-3 bg-light border rounded overflow-auto" style="max-height: 250px;">
                                    <?= $model_item->{LanguageHelper::information()} ?: 'Нет данных о info' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    <?php else: ?>
        <h3 class="text-danger">Данные не найдены!</h3>
    <?php endif; ?>
</div>