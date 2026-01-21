<?php

namespace app\assets;
use yii\web\AssetBundle;

class ArticleAsset extends AssetBundle
{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/article.css"
    ];
    public $js = [
        "js/article.js",
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', // ✅ JS сюда
    ];

    public $depends = [
        'yii\web\YiiAsset', // если нужны jQuery и Yii JS
    ];

}