<?php

namespace app\assets;
use yii\web\AssetBundle;

class CorporateAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/corporate-governance.css",
    ];
    public $js = [
        "js/corporate-ajax-request.js",
        'https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js'
    ];
    public $depends = [
        "yii\web\YiiAsset",
    ];

}