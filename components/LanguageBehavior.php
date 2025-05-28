<?php 
namespace app\components;
use Yii;
use yii\base\Behavior;
use yii\web\Controller;

class LanguageBehavior extends Behavior{
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => "beforeAction",
        ];
    }
    public function beforeAction($event)
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;

        if ($request->get('lang')) {
            $lang = $request->get('lang');
            Yii::$app->language = $lang;
            $session->set('language', $lang);
        } elseif ($session->has('language')) {
            Yii::$app->language = $session->get('language');
        }

        return true;
    }
}