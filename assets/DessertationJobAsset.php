<?php
namespace app\assets;

use yii\web\AssetBundle;

class DessertationJobAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        'css/dissertation_job.css'
    ];
    public $js = [
        'js/dissertation_job.js',
        'js/open-general-pdf.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}