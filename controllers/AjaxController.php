<?php
namespace app\controllers;

use app\components\LanguageHelper;
use app\models\ApplicantForAcademicTitles;
use app\models\Doctorant;
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
    public function actionBakalavrCollege($prof_college, $lang)
    {
        // name_ru, name_kz, name_en

        $profession_college = (new \yii\db\Query())
            ->select(
                [
                    "pc.id as pc_id",
                    "pc.name_$lang as pc_name",
                    "p.name_$lang as p_name",
                    "s.name_$lang as s_name"
                ]
            )
            ->from('profession_college as pc')
            ->innerJoin('profession as p', 'pc.profession_id = p.id')
            ->innerJoin('subject_to_profession as stp', 'stp.profession_id = p.id')
            ->innerJoin('subject as s', 's.id = stp.subject_id')
            ->where(['like', "pc.name_$lang", $prof_college])
            ->orderBy('pc_name,p_name,s_name')
            ->all();

        return $this->asJson($profession_college);
    }
    public function actionAdmissionFormSpecialization($prof_type)
    {
        $profession = (new \yii\db\Query())
            ->select(
                [
                    'p_name' => 'p.' . LanguageHelper::name(),
                    'ent' => 's.' . LanguageHelper::name(),
                    's_passing_points' => 'p.semi_passing_points',
                    'p.passing_points'

                ]
            )->from(['p' => 'profession'])
            ->innerJoin(['stp' => 'subject_to_profession'], 'p.id=stp.profession_id')
            ->innerJoin(['s' => 'subject'], 's.id=stp.subject_id')
            ->where(['p.id' => $prof_type])
            ->orderBy('p.' . LanguageHelper::name())
            ->all();
        return $this->asJson($profession);
    }
    public function actionGetDoctorant($search)
    {
        $staff = Doctorant::find()
        ->select(['id','full_name_ru'])
            ->where(['like', 'full_name_ru', $search])
            ->all();
            return $this->asJson($staff);
    }
        public function actionGetProfessor($search)
    {
        $staff = ApplicantForAcademicTitles::find()
        ->select(['id','full_name_ru'])
            ->where(['like', 'full_name_ru', $search])
            ->all();
            return $this->asJson($staff);
    }
}