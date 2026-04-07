<?php
namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{  public $basePath = "@webroot";
    public $baseUrl = "@web";

    public $css = [
        "css/admin-edit.css"
    ];

    public $js = [
            //  'https://cdn.tiny.cloud/1/dh851zzc2lhniwdysf0p1ckjsj3ex5zf5ssp8jvaru77qzk6/tinymce/7/tinymce.min.js',
    ];
}
