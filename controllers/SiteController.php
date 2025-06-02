<?php

namespace app\controllers;

use app\models\Departament;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Faculty;
use app\models\Staff;
use app\models\Article;

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
        return $this->render('index');
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
        return $this->render('faculty', ['faculty' => $faculty, 'dean' => $dean, 'departament' => $departament]);
    }
    public function actionArticle($type)
    {
        $lang = Yii::$app->language;


        $article = Article::find(['type' => $type])
            ->joinWith(['refArticle']) // связи между таблицами
            ->where([
                'ref_article.type' => $type,

            ])->one();
        ;
        return $this->render('article', ['model' => $article]);
    }
    public function actionManagementStructure($type)
    {
        $lang = Yii::$app->language;
        $staff = Staff::find()->joinWith(['refStaff'])->where(['ref_staff.type' => $type])->all();
        return $this->render('management-structure', ['model' => $staff, 'type' => $type]);

    }


}
