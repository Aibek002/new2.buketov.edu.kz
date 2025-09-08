<?php
namespace app\components;

use Yii;

class LanguageHelper
{
    public static function field($baseName)
    {
        return $baseName . '_' . Yii::$app->language;
    }

    public static function name()
    {
        return self::field('name');
    }

    public static function welcome()
    {
        return self::field('welcome');
    }

    public static function information()
    {
        return self::field('information');
    }
    public static function surname()
    {
        return self::field('surname');
    }
    public static function patronymic()
    {
        return self::field('patronymic');
    }
    public static function job_title()
    {
        return self::field('job_title');
    }
    public static function title()
    {
        return self::field('title');
    }
    public static function content()
    {
        return self::field('content');
    }
 

}
