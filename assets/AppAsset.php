<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;
use Yii;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/admin-panel.css'
    ];
    public $js = [
        'js/main.js',
        'js/admission-slider-toggle.js',
        'js/header-scroll-effects.js',
        'js/header-menu-toggle.js',
        'js/home-carousel-animation.js',
        'js/faculties-slider-toggle.js',


        
    ];
    public function init()
{
    $this->css = [
        'css/site.css?v=' . filemtime(Yii::getAlias('@webroot/css/site.css')),
        'css/faculties.css?v=' . filemtime(Yii::getAlias('@webroot/css/faculties.css')),
        'css/admin-panel.css?v=' . filemtime(Yii::getAlias('@webroot/css/admin-panel.css')),


    ];
    parent::init();
}
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
