<?php 

namespace app\assets;
use yii\web\AssetBundle;

class InternationalStudentsAsset extends AssetBundle{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/international-students.css"
        ];
    public $js = [
        "js/international-students.js"
    ];
   
}