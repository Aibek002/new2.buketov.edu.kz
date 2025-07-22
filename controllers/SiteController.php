<?php

namespace app\controllers;

use app\models\AdmissionPdf;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\Profession;
use app\models\Events;
use Symfony\Component\BrowserKit\History;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Faculty;
use app\models\Staff;
use app\models\Article;
use app\models\Subject;
use app\models\News;


use app\models\HistoryFaculty;
use app\models\HistoryDepartament;
use yii\helpers\Html;
use \app\components\LanguageHelper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'language' => [
                'class' => \app\components\LanguageBehavior::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $current_day = (int) Yii::$app->formatter->asDate('today', 'dd');
        $current_month = (int) Yii::$app->formatter->asDate('today', 'MM');
        $current_year = (int) Yii::$app->formatter->asDate('today', 'yyyy');
        $news_for_home = News::find()
            ->select([
                LanguageHelper::title() . ' AS title',
                LanguageHelper::content() . ' AS content',
                'date',
            ])->orderBy(['id' => SORT_DESC])
            ->limit(3)
            ->asArray()
            ->all();

        // $events = Events::find()
        // ->select([
        //         'title_en AS title',
        //         'content_en AS content',
        //         'year',
        //         'month',
        //         'day',
        //     ])
        // ->where(['>','day',$current_day])
        // ->andWhere(['>','month',$current_month])
        // ->andWhere(['>','year',$current_year])
        // ->orderBy([
        //     'day'=>SORT_ASC,
        //     'month'=>SORT_ASC,
        //     'year'=>SORT_ASC
        // ])
        // ->all();

        $current_date = (new \yii\db\Expression('CURDATE()'));  // Получаем текущую дату

        $events = Events::find()
            ->select([
                'title_en AS title',
                'content_en AS content',
                'year',
                'month',
                'day',
            ])
            ->where(['>', 'DATE(CONCAT(year, "-", month, "-", day))', $current_date])
            ->orderBy([
                'year' => SORT_ASC,
                'month' => SORT_ASC,
                'day' => SORT_ASC
            ])
            ->asArray()
            ->limit(3)
            ->all();


        return $this->render('index', ['news' => $news_for_home, 'events' => $events]);
    }
    public function actionFaculty($name)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $faculty = Faculty::findOne(['name_ru' => $name]);
        $faculty_id = $faculty->id;
        $dean = Staff::find()
            ->joinWith(['refStaff']) // связи между таблицами
            ->where([
                'staff.faculty_id' => $faculty_id,
                'ref_staff.type' => 'dean',
            ])
            ->one();

        $departament = Departament::findAll(['faculty_id' => $faculty_id]);
        return $this->render('faculty', ['faculty' => $faculty, 'dean' => $dean, 'departament' => $departament, 'faculty_id' => $faculty_id, 'name' => $name]);
    }

    public function actionHistoryFaculty($faculty_id)
    {
        $lang = Yii::$app->language;

        $article = HistoryFaculty::find()

            ->where([
                'faculty_id' => $faculty_id,

            ])
            ->one();

        return $this->render('article', ['model' => $article]);

    }
    public function actionDepartament($departament_id)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $departament = Departament::findOne(['id' => $departament_id]);
        $teachers = (new \yii\db\Query())
            ->select([
                'name' => LanguageHelper::name(),
                'surname' => LanguageHelper::surname(),
                'patronymic' => LanguageHelper::patronymic(),
                'patronymic' => LanguageHelper::patronymic(),
                'information' => LanguageHelper::information(),
                'job_title' => LanguageHelper::job_title(),
                'email'


            ])->from('staff')
            ->innerJoin('ref_staff', ' ref_staff.id = staff.ref_staff_id ')
            ->where(['departament_id' => $departament_id])
            ->orderBy(LanguageHelper::name())
            ->all();
        return $this->render('departament', ['departament' => $departament, 'departament_id' => $departament_id, 'teachers' => $teachers]);
    }
    public function actionHistoryDepartament($departament_id)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $departament = HistoryDepartament::findOne(['departament_id' => $departament_id]);

        ;
        return $this->render('history-departament', ['model' => $departament]);
    }
    public function actionArticle($type, $title)
    {
        $lang = Yii::$app->language;

        $article = Article::find()
            ->joinWith(['refArticle']) // 'refArticle' — имя связи в модели Article
            ->where([
                'ref_article.type' => $type,
                'article.title_en' => $title,
            ])
            ->one();

        return $this->render('article', ['model' => $article]);

    }
    public function actionManagementStructure($type)
    {
        $lang = Yii::$app->language;
        $staff = Staff::find()->joinWith(['refStaff'])->where(['ref_staff.type' => $type])->all();
        return $this->render('management-structure', ['model' => $staff, 'type' => $type]);

    }


    public function actionCorparate()
    {
        $year = CorpSoleShareholder::find()->select(['year','lang']) ->distinct()->orderBy('year')->all();
        $pdf = CorpSoleShareholder::find()->all();
        return $this->render('corparate', ['years' => $year, 'pdf' => $pdf]);
    }

    public function actionSovet()
    {
        return $this->render('sovet');
    }
    public function actionAdmission($type)
    {
        $subjects = Subject::find()->orderBy(LanguageHelper::name())->all();
        $profession_university = Profession::find()->orderBy(LanguageHelper::name())->all();
        $pdf = AdmissionPdf::find()
            ->orderBy('ref_sort_order_id')
            ->asArray()
            ->all();

        return $this->render('admission', [
            'subjects' => $subjects,
            'profession_university' => $profession_university,
            'type' => $type,
            'pdf' => $pdf
        ]);
    }

    public function actionInternationalStudents()
    {
        return $this->render('international-students');
    }
    public function actionImg()
    {
        return $this->render('img');
    }
    public function actionOpenGeneralPdf($path, $url, $year = null)
    {
        $params = [
            'url' => $url,
            'path' => $path

        ];
        if ($year !== null) {
            $params['year'] = $year;
        }

        return $this->render('open-general-pdf', ['params' => $params]);
    }
    public function actionDissertationJob()
    {
        return $this->render('dissertation-job');
    }
}
