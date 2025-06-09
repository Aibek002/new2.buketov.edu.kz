<?php 

namespace app\assets;
use yii\web\AssetBundle;

class AdmissionAsset extends AssetBundle{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/admission.css"
        ];
    public $js = [
        "js/admission.js"
    ];
   
}