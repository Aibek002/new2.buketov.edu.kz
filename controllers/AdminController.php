<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Faculty;


class AdminController extends Controller
{

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionFacultyAdminPanel(){
        $faculty = new Faculty();
        if($faculty->load(Yii::$app->request->post()) && $faculty->save()){
            return $this->redirect(['admin/index']);
        }
        return $this->render('faculty-admin-panel',
        ['model'=>$faculty]
        );
    }

}

