<?php
namespace app\assets;
use yii\web\AssetBundle;

class DissertationAdviceAdminAsset extends AssetBundle{
    public $basePath = "@webroot";
    public $baseUrl = "@web";
    public $css =[
        'css/dissertation-advice-admin-panel.css'
        
    ];
    public $js =[
        'js/dissertation-advice-admin-panel.js'
    ];
    public $depends =[
        'yii\web\YiiAsset'
    ];
}