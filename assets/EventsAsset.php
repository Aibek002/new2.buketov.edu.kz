<?php 

namespace app\assets;
use yii\web\AssetBundle;

class EventsAsset extends AssetBundle{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/events.css"
        ];
    public $js = [
        "js/events.js",
    ];
   
}