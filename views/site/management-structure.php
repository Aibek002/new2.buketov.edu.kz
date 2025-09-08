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
            <div class="card" data-bs-toggle="modal" data-bs-target="#staffModal"
                data-name="<?= $model_item->{LanguageHelper::surname()} . ' ' . $model_item->{LanguageHelper::name()} . ' ' . $model_item->{LanguageHelper::patronymic()} ?>"
                data-job="<?= $model_item->{LanguageHelper::job_title()} ?: 'Нет данных о должности' ?>"
                data-email="<?= $model_item->email ?: 'Нет данных о email' ?>"
                data-info='<?= $model_item->{LanguageHelper::information()} ?: 'Нет данных о info' ?>'
                data-phone="<?= $model_item->phone ?: 'Нет данных о phone' ?>"
                data-image="<?= $model_item->image->image ?? 'https://cdn-icons-png.flaticon.com/512/4519/4519678.png' ?>">

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
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden" style="background: #f9f9f9;">

                <!-- Header -->
                <div class="modal-header border-0"
                    style="background: linear-gradient(145deg, #274b7a, #2f5fa1); color: #fff;">
                    <h5 class="modal-title fw-bold" id="staffModalLabel">ФИО</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body d-flex p-4" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Фото (фиксированное) -->
                    <div class="flex-shrink-0 text-center">
                        <img id="modalImage" src="" alt="Фото сотрудника" class="rounded-circle shadow"
                            style="width: 160px; height: 160px; object-fit: cover; border: 4px solid #2f5fa1;">
                    </div>

                    <!-- Текст (прокручиваемый) -->
                    <div class="ms-4 flex-grow-1">
                        <h4 id="modalName" class="fw-bold mb-2" style="color: #274b7a;">Имя Фамилия</h4>
                        <p id="modalInfo" class="small text-muted mb-2">Должность</p>

                        <p id="modalEmail" class="mb-1"><strong>📧 Email:</strong> <a
                                href="mailto:example@mail.com">example@mail.com</a></p>
                        <p id="modalPhone" class="mb-1"><strong>📞 Телефон:</strong> <a href="tel:+77771234567">+7 777 123
                                45 67</a></p>

                        <div id="modalExtra" class="text-secondary" style="font-size: 14px; white-space: pre-line;">
                            Дополнительная информация о сотруднике.
                            Этот блок может быть очень длинным, и тогда появится прокрутка внутри модального окна.
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 d-flex justify-content-end" style="background: #f5f7fa;">
                    <button type="button" class="btn btn-outline-primary rounded-pill px-4" data-bs-dismiss="modal">
                        Закрыть
                    </button>
                </div>

            </div>
        </div>
    </div>



<?php else: ?>
    <h3 class="text-danger">Данные не найдены!</h3>
<?php endif; ?>