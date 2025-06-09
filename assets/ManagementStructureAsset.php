<?php
namespace app\assets;
use yii\web\AssetBundle;

class ManagementStructureAsset extends AssetBundle
{

    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css = [
        "staff-management-structure.css"
    ];
    public $js = [  
        "management-structure.js"
    ];
}