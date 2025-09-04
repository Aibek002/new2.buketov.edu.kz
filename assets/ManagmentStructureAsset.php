<?php

namespace app\assets;
use yii\web\AssetBundle;

class ManagmentStructureAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        'css/management-structure.css',
    ];
    public $js = [
        'js/management-structure.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];


}