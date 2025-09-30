<?php

namespace app\assets;
use yii\web\AssetBundle;

class CorporateAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/corporate-governance.css",
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    ];
    public $js = [
        "js/corporate-ajax-request.js",
        'js/corporate-load-pdf.js',
        'js/corporate-main.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js',
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js",
    ];
    public $depends = [
        "yii\web\YiiAsset",
    ];

}