<?php

namespace app\controllers;

use app\models\Departament;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Faculty;
use app\models\Staff;
use app\models\Article;


class AdminController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFacultyAdminPanel()
    {
        $faculty = new Faculty();
        if ($faculty->load(Yii::$app->request->post()) 
        && 
        $faculty->save()) {
            return $this->redirect(['admin/index']);
        }
        return $this->render(
            'faculty-admin-panel',
            ['model' => $faculty]
        );
    }
    public function actionStaffAdminPanel()
    {
        $staff = new Staff();
        if ($staff->load(Yii::$app->request->post()) && $staff->save()) {
            return $this->redirect(['admin/index']);
        }
        return $this->render('staff-admin-panel', ['model' => $staff]);

    }

    public function actionDepartamentAdminPanel()
    {
        $departament = new Departament();
        if (Yii::$app->request->isPost) {
            if ($departament->load(Yii::$app->request->post()) && $departament->save()) {
                return $this->redirect(['admin/index']);
            }
        }
        return $this->render('departament-admin-panel' , ['model'=> $departament]);

    }

    public function actionArticleAdminPanel(){
        $article = new Article();
        if ($article->load(Yii::$app->request->post()) && $article->save()) {
            return $this->redirect(['admin/index']);
        }
        return $this->render('article-admin-panel', ['model'=> $article]);
    }
}

