<?php

namespace app\assets;
use yii\web\AssetBundle;

class CorporateAdminAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        'css/corporate-admin-panel.css',
    ];
    public $js = [
        'js/corporate-admin-panel-sort.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',

    ];
}