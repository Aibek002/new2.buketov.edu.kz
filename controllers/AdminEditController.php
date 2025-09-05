<?php

namespace app\controllers;

use app\components\LanguageHelper;
use app\models\ApplicantForAcademicTitles;
use app\models\CorporateGovernanceFile;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\Doctorant;
use app\models\Profession;
use app\models\RefFiles;
use app\models\RefImage;
use app\models\RefStaff;
use app\models\TypeRefStaff;
use app\models\User;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use Symfony\Component\BrowserKit\History;
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
use app\models\News;
use app\models\Image;
use app\models\Files;

use app\models\AdmissionPdf;
use app\models\ImageArticle;

use app\models\HistoryFaculty;
use app\models\HistoryDepartament;
use app\models\ProfessionCollege;




class AdminEditController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['sign-in'],
                        'allow' => true,
                        'roles' => ['?'], // ? — только для неавторизованных (гостей)
                    ],
                    [
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
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionEditHistoryDepartament()
    {
        $history = HistoryDepartament::find()
            ->select([
                'id',
                LanguageHelper::title() . ' as title',
            ])
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-history-departament', ['history' => $history]);
    }
    public function actionEditFormHistoryDepartament($id)
    {
        $model = HistoryDepartament::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-history-departament']);
        }

        return $this->render('edit-form-history-departament', ['model' => $model]);
    }
    public function actionEditHistoryFaculty()
    {
        $history = HistoryFaculty::find()
            ->select([
                'id',
                LanguageHelper::title() . ' as title',
            ])
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-history-faculty', ['history' => $history]);
    }
    public function actionEditFormHistoryFaculty($id)
    {
        $model = HistoryFaculty::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-history-faculty']);
        }

        return $this->render('edit-form-history-faculty', ['model' => $model]);
    }
    public function actionEditArticle()
    {
        $article = Article::find()
            ->select([
                'id',
                LanguageHelper::title() . ' as title',
            ])
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-article', ['article' => $article]);
    }
    public function actionEditFormArticle($id)
    {
        $model = Article::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-article']);
        }

        return $this->render('edit-form-article', ['model' => $model]);
    }

    public function actionEditFaculty()
    {
        $model = Faculty::find()
            ->select([
                'id',
                LanguageHelper::name() . ' as name',
            ])
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-faculty', ['model' => $model]);
    }
    public function actionEditFormFaculty($id)
    {
        $model = Faculty::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-faculty']);
        }

        return $this->render('edit-form-faculty', ['model' => $model]);
    }
    public function actionEditDepartament()
    {
        $model = Departament::find()
            ->select([
                'id',
                'name_ru as name',
            ])
            ->orderBy(new \yii\db\Expression("SUBSTRING(name_ru, 9) ASC"))
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-departament', ['model' => $model]);
    }
    public function actionEditFormDepartament($id)
    {
        $model = Departament::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-departament']);
        }

        return $this->render('edit-form-departament', ['model' => $model]);
    }
        public function actionEditProfessionCollege()
    {
        $model = ProfessionCollege::find()
            ->select([
                'id',
                'name_ru as name',
            ])
            ->orderBy(new \yii\db\Expression("SUBSTRING(name_ru, 9) ASC"))
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-profession-college', ['model' => $model]);
    }
    public function actionEditFormProfessionCollege($id)
    {
        $model = ProfessionCollege::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-profession-college']);
        }

        return $this->render('edit-form-profession-college', ['model' => $model]);
    }
      public function actionEditStaff()
    {
        $model = Staff::find()
            ->select([
                'id',
                'name_ru as name',
                 'surname_ru as surname',
                  'patronymic_ru as patronymic',
            ])
            ->orderBy(new \yii\db\Expression("SUBSTRING(name_ru, 9) ASC"))
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-staff', ['model' => $model]);
    }
    public function actionEditFormStaff($id)
    {
        $model = Staff::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-staff']);
        }

        return $this->render('edit-form-staff', ['model' => $model]);
    }
        public function actionEditNews()
    {
        $model = News::find()
            ->select([
                'id',
                'title_ru as name',
                
            ])
            
            ->asArray()
            ->all();
        // print_r($history);die;
        return $this->render('edit-news', ['model' => $model]);
    }
    public function actionEditFormNews($id)
    {
        $model = News::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("History not found");
        }

        // Если пришли данные из формы
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin-edit/edit-news']);
        }

        return $this->render('edit-form-news', ['model' => $model]);
    }
}