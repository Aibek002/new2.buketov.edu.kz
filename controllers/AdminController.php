<?php

namespace app\controllers;

use app\models\Departament;
use app\models\Profession;
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

use app\models\HistoryFaculty;
use app\models\HistoryDepartament;
use app\models\ProfessionCollege;


class AdminController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFacultyAdminPanel()
    {
        $faculty = new Faculty();
        if (
            $faculty->load(Yii::$app->request->post())
            &&
            $faculty->save()
        ) {
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
        return $this->render('departament-admin-panel', ['model' => $departament]);

    }
    public function actionHistoryFacultyAdminPanel()
    {
        $history = new HistoryFaculty();
        if (Yii::$app->request->isPost) {
            if ($history->load(Yii::$app->request->post()) && $history->save()) {
                return $this->redirect(['admin/index']);
            }
        }
        return $this->render('history-faculty-admin-panel', ['model' => $history]);

    }
    public function actionHistoryDepartamentAdminPanel()
    {
        $history = new HistoryDepartament();
        if (Yii::$app->request->isPost) {
            if ($history->load(Yii::$app->request->post()) && $history->save()) {
                return $this->redirect(['admin/index']);
            }
        }
        return $this->render('history-departament-admin-panel', ['model' => $history]);

    }
    public function actionArticleAdminPanel()
    {
        $article = new Article();
        if ($article->load(Yii::$app->request->post()) && $article->save()) {
            return $this->redirect(['admin/index']);
        }
        return $this->render('article-admin-panel', ['model' => $article]);
    }
    public function actionProfessionCollege()
    {
        $profession_college = new ProfessionCollege();
        if (Yii::$app->request->isPost) {
            if ($profession_college->load(Yii::$app->request->post()) && $profession_college->save()) {
                return $this->redirect(['admin/index']);
            }
        }
        return $this->render('profession_college', ['model' => $profession_college]);

    }
    public function actionNewsAdminPanel()
    {
        $news = new News();

        if (Yii::$app->request->isPost) {
            if ($news->load(Yii::$app->request->post()) && $news->save()) {

                $uploadedImages = UploadedFile::getInstances(new Image(), 'image');
                foreach ($uploadedImages as $image_item) {
                    $imgName = 'news_' . uniqid() . '.' . $image_item->extension;
                    $path = '/etc/docker/new2-buketov/site/images/';
                    // $path = Yii::getAlias('@webroot/images/news/');

                    if (!is_dir($path)) {
                        if (!mkdir($path, 0775, true)) {
                            Yii::error("Не удалось создать папку: $path", __METHOD__);
                            throw new \RuntimeException("Не удалось создать папку для загрузки изображений.");
                        }
                    }
                    $image_item->saveAs(Yii::getAlias($path . $imgName));

                    $imageModel = new Image();
                    $imageModel->ref_image_id = 1;
                    $imageModel->column_id = $news->id;
                    $imageModel->image = $imgName;
                    $imageModel->save(false);
                }

                Yii::$app->session->setFlash('success', 'Successfully created!');
                return $this->redirect(['admin/index']);
            } else {
                Yii::$app->session->setFlash('error', 'Error when creating!');
            }
        }

        return $this->render('news-admin-panel', [
            'model' => $news,
            'images' => new Image()
        ]);
    }


}

