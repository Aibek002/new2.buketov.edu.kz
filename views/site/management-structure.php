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
<?php if ($model): ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-md-4 g-4 m-5 p-5 my-5">
        <?php foreach ($model as $index => $model_item): ?>
            <div class="card">
                <div class="avatar-container">
                    <div class="avatar-circle">
                        <img src="<?= $model_item->image->image ?? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>"
                            class="avatar-img">
                    </div>
                </div>

                <h3 class="card-title"> 
                    <?= $model_item->{LanguageHelper::surname()} ?>
                    <?= $model_item->{LanguageHelper::name()} ?>
                    <?= $model_item->{LanguageHelper::patronymic()} ?>
                </h3>
                <p class="card-text"><?= $model_item->{LanguageHelper::job_title()} ?></p>
            </div>

            <!-- <div class="col staff-management-structure">
                <div class="card h-100 shadow-sm text-center cursor-pointer" data-bs-toggle="modal" data-bs-target="#staffModal"
                    data-title="<?= htmlspecialchars($model_item->{LanguageHelper::job_title()}) ?>"
                    data-name="<?= htmlspecialchars($model_item->{LanguageHelper::surname()} . ' ' . $model_item->{LanguageHelper::name()} . ' ' . $model_item->{LanguageHelper::patronymic()}) ?>"
                    data-img="<?= $model_item->image->image ?? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>">

                    <img src="<?= $model_item->image->image ?? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>"
                        class="card-img-top mx-auto d-block mt-3 rounded-circle" alt="Фото"
                        style="width: 150px; height: 150px; object-fit: cover;">

                    <div class="card-body staff-management-structure-card-body">
                        <h5 class="card-title text-primary"></h5>
                        <p class="card-text fw-bold mb-1">
                            <?= $model_item->{LanguageHelper::surname()} ?>
                            <?= $model_item->{LanguageHelper::name()} ?>
                            <?= $model_item->{LanguageHelper::patronymic()} ?>
                        </p>
                    </div>
                </div>
            </div> -->
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staffModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <img id="modalImage" src="" class="rounded-circle me-4"
                        style="width: 150px; height: 150px; object-fit: cover;">
                    <div>
                        <h5 id="modalName" class="mb-2"></h5>
                        <p id="modalInfo" class="small text-muted"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <h3 class="text-danger">Данные не найдены!</h3>
<?php endif; ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('staffModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const card = event.relatedTarget;
            const title = card.getAttribute('data-title');
            const name = card.getAttribute('data-name');
            const info = card.getAttribute('data-info');
            const img = card.getAttribute('data-img');

            modal.querySelector('#staffModalLabel').innerHTML = title;
            modal.querySelector('#modalName').innerHTML = name;
            modal.querySelector('#modalInfo').innerHTML = info;
            modal.querySelector('#modalImage').src = img;
        });
    });
</script>