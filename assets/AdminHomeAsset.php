<?php 

namespace app\assets;
use yii\web\AssetBundle;

class AdminHomeAsset extends AssetBundle{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/admin-home.css"
        ];
    public $js = [
        "js/admin-home.js",
   

    ];
   
}