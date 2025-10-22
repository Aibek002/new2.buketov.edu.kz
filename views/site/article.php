<?php
use app\components\LanguageHelper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<?php if (!empty($model)): ?>
    <div class="m-5 p-5">
        <?php foreach ($model as $item): ?>
            <div class="mb-5">
                <div class="title-content">
                    <div class="title-content-text"><?= !empty($item['title']) ? Html::encode($item['title']) : "не задано" ?>
                    </div>

                    <div class="d-flex gap-5">
                        <?php if (!empty($item['image'])): ?>
                            <div class="my-3">
                                <img src="<?= Html::encode($item['image']) ?>" alt="<?= Html::encode($item['title']) ?>"
                                    style="max-width:300px;">
                            </div>
                        <?php endif; ?>

                        <div class="text-content">
                            <?= !empty($item['content']) ? HtmlPurifier::process($item['content']) : "не задано" ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="m-5 p-5">
        <h1>Данные не найдены</h1>
    </div>
<?php endif; ?>