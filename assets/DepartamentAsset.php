<?php

namespace app\assets;
use yii\web\AssetBundle;

class DepartamentAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/departament.css",
    ];
    public $js = [
        "js/departament.js",
        
    ];
    public $depends = [
        "yii\web\YiiAsset",
    ];

}