<?php
namespace app\assets;
use yii\web\AssetBundle;

class ApplicantAdminAsset extends AssetBundle
{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        'css/applicant-admin.css'
    ];
    public $js = [
        'js/applicant-admin.js'
    ];
    public $depends = [
    ];
}