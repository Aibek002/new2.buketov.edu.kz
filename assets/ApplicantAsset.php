<?php
namespace app\assets;
use yii\web\AssetBundle;

class ApplicantAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/applicant.css'
    ];
    public $js = [
        'js/applicant.js'
    ];
    public $depends = [
    ];
}