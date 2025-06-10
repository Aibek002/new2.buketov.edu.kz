<?php
use app\components\LanguageHelper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<?php if ($model): ?>
    <div class="m-5 p-5">
        <?php
        $title = $model->{LanguageHelper::title()};
        $content = HtmlPurifier::process($model->{LanguageHelper::content()})
            ?>
        <div class="title-page">
            <?= !empty($title) ? $title : "не задано" ?>
        </div>
        <div class="text-content">

        <?= !empty($content) ? $content : "не задано" ?>
        </div>
    </div>
<?php else: ?>
    <div class="m-5 p-5">
        <h1>Данные не найдены</h1>
    </div>
<?php endif; ?>