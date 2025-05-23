<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Faculty;

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
        $faculty=Faculty::findOne(['name' => $name]);

        
        return $this->render('faculty' , ['faculty'=>$faculty]);
    }
    public function actionDissertationWorkOfLaw()
    {
        return $this->render('dissertation_work_of_law');
    }
    public function actionDissertationWorkOfHistory()
    {
        return $this->render('dissertation_work_of_history');
    }
    public function actionDissertationWorkOfMathematics()
    {
        return $this->render('dissertation_work_of_mathematics');
    }
     public function actionDissertationWorkOfPhysics()
    {
        return $this->render('dissertation_work_of_physics');
    }
     public function actionDissertationWorkOfPedagogy()
    {
        return $this->render('dissertation_work_of_pedagogy');
    }
    public function actionDissertationWorkOfKazakhLanguage()
    {
        return $this->render('dissertation_work_of_kaz_language');
    }
    public function actionDissertationWorkOfBiolagy()
    {
        return $this->render('dissertation_work_of_biolagy');
    }
    public function actionDissertationWorkOfChemistry()
    {
        return $this->render('dissertation_work_of_chemistry');
    }
    public function actionDissertationWorkOfForeignLanguage()
    {
        return $this->render('dissertation_work_of_foreign_language');
    }
    public function actionDissertationWorkOfEconomics()
    {
        return $this->render('dissertation_work_of_economics');
    }
    public function actionDissertationWorkOfPhilology()
    {
        return $this->render('dissertation_work_of_philology');
    }
    public function actionDissertationWorkOfThermophysics()
    {
        return $this->render('dissertation_work_of_thermophysics');
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
