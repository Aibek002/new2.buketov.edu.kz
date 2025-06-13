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
    public function actionAdmissionBakalavr($subject1, $subject2)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (!empty($subject1) && !empty($subject2)) {
            $professions = (new \yii\db\Query())
                ->select('*')
                ->from('profession')
                ->where([
                    'in',
                    'id',
                    (new \yii\db\Query())
                        ->select('profession_id')
                        ->from('subject_to_profession')
                        ->where(['subject_id' => [$subject1, $subject2]])
                        ->groupBy('profession_id')
                        ->having(new \yii\db\Expression('COUNT(DISTINCT subject_id) = 2'))
                ])
                ->all();
        } else {

            $professions = (new \yii\db\Query())
                ->select('*')
                ->from('profession')
                ->where([
                    'in',
                    'id',
                    (new \yii\db\Query())
                        ->select('profession_id')
                        ->from('subject_to_profession')
                        ->where(['subject_id' => [$subject1, $subject2]])
                        ->groupBy('profession_id')

                ])
                ->all();
        }


        return $professions;
    }
}