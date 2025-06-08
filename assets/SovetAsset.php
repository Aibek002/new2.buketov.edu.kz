<?php
namespace app\assets;
use yii\web\AssetBundle;

class SovetAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/sovet.css'
    ];
    public $js = [
        'js/sovet.js'
    ];
    public $depends = [
    ];
}