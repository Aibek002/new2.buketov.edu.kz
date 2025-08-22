<?php
namespace app\assets;
use yii\web\AssetBundle;

class StaffAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/staff-admin-panel.css'
    ];
    public $js = [
        'js/staff-admin-panel.js'
    ];
    public $depends = [
    ];
}