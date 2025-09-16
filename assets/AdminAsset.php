<?php 

namespace app\assets;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle{

    public $basePath = "@webroot";
    public $baseUrl = "@web";

   
    public $js = [
        "https://cdn.tiny.cloud/1/wmtfk0v9m750xo316xpx88hktns85a0m5lgbaiz4kbnun0cj/tinymce/7/tinymce.min.js",

    ];
   
}