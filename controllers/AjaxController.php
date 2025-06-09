<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Staff;
class AjaxController extends Controller
{
    // public function actionGetSoleShareholder()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    //     return Staff::find()
    //         ->joinWith(['refStaff'])
    //         ->where(['ref_staff.type' => ['Rector', 'Vice-Rector']])
    //         ->asArray()
    //         ->all();
    // }
    public function actionGetBoardOfDirectors()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Staff::find()
            ->joinWith(['refStaff'])
            ->where([
                'ref_staff.type' =>
                    [
                        'Board-of-directors',
                        'Corporate-Secretary',
                        'Internal-Audit-Service',
                        'Anti-corruption-CS',
                        'Board-Committee',

                    ],
                


            ])
            ->asArray()
            ->all();

    }
    public function actionGetGovernance()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Staff::find()
            ->joinWith(['refStaff'])
            ->where([
                'ref_staff.type' =>
                    [
                        'Rector',
                        'Vice-Rector',
                    ]
            ])
            ->asArray()
            ->all();

    }

}