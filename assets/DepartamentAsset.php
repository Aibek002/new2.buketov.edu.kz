<?php

namespace app\assets;
use yii\web\AssetBundle;

class DepartamentAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/departament.css",
        "https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    ];
    public $js = [
        "js/departament.js",

    ];
    public $depends = [
        "yii\web\YiiAsset",
    ];

}