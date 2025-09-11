<?php
namespace app\controllers;

use app\components\LanguageHelper;
use app\models\ApplicantForAcademicTitles;
use app\models\CorporateGovernanceFile;
use app\models\Doctorant;
use app\models\Files;
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
            ->joinWith(['refStaff', 'image'])
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
            ->joinWith(['refStaff', 'image'])
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
            ->select(['id', 'full_name_ru'])
            ->where(['like', 'full_name_ru', $search])
            ->all();
        return $this->asJson($staff);
    }
    public function actionGetProfessor($search)
    {
        $staff = Staff::find()
            ->select(['staff.id', 'staff.surname_ru', 'staff.name_ru', 'staff.patronymic_ru'])
            ->innerJoin('type_ref_staff', 'type_ref_staff.staff_id=staff.id')
            ->where(['like', 'surname_ru', $search])
            ->andWhere(['in', 'type_ref_staff.ref_staff_id', [14, 15]])
            ->asArray()
            ->all();

        return $this->asJson($staff);
    }
    public function actionGetNormativeDocs($diss_id)
    {
        $file = Files::find()
            ->select(['language_file', 'fileName', 'id'])
            ->where(['dissertation_advice_id' => $diss_id])
            ->andWhere(['ref_files_id' => 2])
            ->asArray()
            ->all();

        return $this->asJson($file);
    }
    public function actionGetDoctorants($diss_id)
    {
        $doctorant = Doctorant::findAll(['dissertation_id' => $diss_id]);

        return $this->asJson($doctorant);
    }
    public function actionGetDoctorantsDoc($doctorant_id)
    {
        $doctorant_doc = Files::find()
            ->where(['doctorant_id' => $doctorant_id])
            ->orderBy(['fileName' => SORT_ASC]) // или SORT_DESC
            ->all();

        return $this->asJson($doctorant_doc);
    }
    public function actionGetSortId($type_corporate = null)
    {
        $model = CorporateGovernanceFile::find()
            ->select('sort_id')
            ->where([
                'ref_corporate_governance' => $type_corporate
            ])
            ->orderBy(['sort_id' => SORT_ASC])
            ->distinct()
            ->all();
        return $this->asJson($model);
    }
    public function actionGetFileForChange($type_corporate = null, $sort_id = null)
    {
        $model = CorporateGovernanceFile::find()
            ->where([
                'sort_id' => $sort_id,
                'ref_corporate_governance' => $type_corporate
            ])
            ->orderBy(['name_url' => SORT_ASC])
            ->all();
        return $this->asJson($model);
    }
    public function actionChatBot($message)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $apiKey = trim($_ENV['GOOGLE_API_KEY']);

        $ch = curl_init("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $apiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        $language = Yii::$app->language; // рус, укр, англ и т.д.

        // Инструкция встроена в текст запроса
        $postData = [
            "contents" => [
                [
                    "role" => "user",
                    "parts" => [
                        ["text" => "$message"]
                    ]
                ]
            ]
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);

        return $data;
    }
}