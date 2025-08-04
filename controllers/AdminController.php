<?php

namespace app\controllers;

use app\models\CorporateGovernanceFile;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\Profession;
use app\models\User;
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
use app\models\AdmissionPdf;
use app\models\ImageArticle;

use app\models\HistoryFaculty;
use app\models\HistoryDepartament;
use app\models\ProfessionCollege;




class AdminController extends Controller
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
        $path = Yii::getAlias('@app/../files/images/news/');
        // $path = Yii::getAlias('@app/files/images/news/');

        if (Yii::$app->request->isPost) {
            if ($news->load(Yii::$app->request->post()) && $news->save()) {

                $uploadedImages = UploadedFile::getInstances(new Image(), 'image');
                foreach ($uploadedImages as $image_item) {
                    $imgName = 'news_' . uniqid() . '.' . $image_item->extension;

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

                Yii::$app->session->setFlash('success', "News Successfully created!");
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
    public function actionAdmissionPdfAdminPanel()
    {
        $models = new AdmissionPdf();

        if (Yii::$app->request->isPost) {
            if ($models->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($models, 'file');
                $levels = [
                    1 => 'bachelor',
                    2 => 'magistracy',
                    3 => 'doctorant',
                ];
                $skill_level = $levels[$models->skill_level_id] ?? 'unknown';
                if ($models->replace_file_id) {
                    $update = AdmissionPdf::find()->where(['path' => $models->replace_file_id])->one();
                    if ($update) {
                        $update->archive = 1;
                        $update->save(false);
                    }
                }

                if ($file) {
                    $savePath = Yii::getAlias("@app/../files/pdf/admission/$skill_level/$models->lang_pdf/");

                    if (!is_dir($savePath)) {
                        if (!mkdir($savePath, 0775, true)) {
                            Yii::error("Не удалось создать папку: $savePath", __METHOD__);
                            throw new \RuntimeException("Не удалось создать папку для загрузки PDF приемный комиссий.");
                        }
                    }

                    $fileName = $models->name_url . "." . $file->extension;
                    if (!$file->saveAs($savePath . $fileName)) {
                        Yii::error("Ошибка при сохранении файла: {$file->error}", __METHOD__);
                        Yii::$app->session->setFlash('error', 'Ошибка при сохранении файла: ' . $file->error);
                        return $this->refresh();
                    } else {
                        $models->name_url = $models->name_url;
                        $models->lang_pdf = $models->lang_pdf;
                        $models->archive = 0;
                        $models->author = Yii::$app->user->identity->id;
                        $models->path = $fileName;
                        if ($models->save()) {
                            Yii::$app->session->setFlash('success', 'Файл успешно загружен');
                            return $this->redirect(['admission-pdf-admin-panel']);
                        } else {
                            Yii::$app->session->setFlash('error', 'Ошибка при сохранении');
                        }
                    }


                }


            }
        }

        return $this->render('admission-pdf-admin-panel', ['models' => $models]);
    }
    public function actionUploadImage()
    {
        $image = new ImageArticle();

        if (Yii::$app->request->isPost) {
            if ($image->load(Yii::$app->request->post())) {
                $image->images = UploadedFile::getInstances($image, 'images');

                print_r($image->images);
                if (empty($image->images)) {
                    Yii::$app->session->setFlash('error', 'Нет загруженных файлов.');
                    return $this->refresh();
                }

                $upload_path = Yii::getAlias("@app/../files/images/image_article/{$image->ref_article_id}/");

                if (!is_dir($upload_path) && !mkdir($upload_path, 0755, true)) {
                    Yii::error("Не удалось создать папку: $upload_path", __METHOD__);
                    throw new \RuntimeException("Не удалось создать папку для загрузки изображений.");
                }


                foreach ($image->images as $uploadedFile) {
                    $filename = "article_{$image->ref_article_id}_" . uniqid() . "." . $uploadedFile->extension;
                    $uploadedFile->saveAs($upload_path . $filename);
                    $newRecord = new ImageArticle();
                    $newRecord->ref_article_id = $image->ref_article_id;
                    $newRecord->author = Yii::$app->user->id;
                    $newRecord->image = $filename;
                    $newRecord->save(false);
                }

                Yii::$app->session->setFlash("success", "Файлы успешно загружены.");
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash("error", "Ошибка при загрузке формы.");
            }
        }

        return $this->render('upload-image', ['model' => $image]);
    }
    public function actionSignUp()
    {
        $user = new User();
        if ($user->load(Yii::$app->request->post())) {
            $user->auth_key = Yii::$app->security->generateRandomString();
            if ($user->save(false)) {
                if (!empty($user->role)) {
                    $auth = Yii::$app->authManager;
                    $role = $auth->getRole($user->role);
                    if ($role) {
                        $auth->assign($role, $user->id);
                        Yii::$app->session->setFlash("success", "User created with role!");
                        return $this->redirect(['admin/index']); // или редирект

                    } else {
                        Yii::$app->session->setFlash("error", "User created without role!");

                    }
                } else {
                    Yii::$app->session->setFlash("error", "Role is empty!");

                }
            }

        }

        return $this->render('sign-up', ['user' => $user]);
    }
    public function actionSignIn()
    {
        $form = new User();

        if ($form->load(Yii::$app->request->post())) {
            $user = User::findOne(['username' => $form->username]);

            if ($user && $user->password_hash === $form->password_hash) {
                Yii::$app->user->login($user); // login принимает объект пользователя
                return $this->redirect(['admin/index']); // перенаправление на главную
            } else {
                Yii::$app->session->setFlash('error', 'Неверный логин или пароль.');
            }
        }

        return $this->render('sign-in', [
            'user' => $form
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['admin/index']);
    }
    public function actionCorporateGovernanceFile()
    {
        $model = new CorporateGovernanceFile();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance(new CorporateGovernanceFile(), 'file');
            $model->author = Yii::$app->user->id;

            if ($model->subsection_corporate_governance === 'Решения Единственного Акционера') {

                $path = Yii::getAlias("@app/../files/pdf/corporate_governance/sole-shareholder/$model->year/$model->language_file/");
                $fileName = uniqid() . "_" . $model->name_url . "." . $file->extension;
                $model->ref_corporate_governance = 1;
                $model->path_file = "/files/pdf/corporate_governance/sole-shareholder/" . $model->year . "/" . $model->language_file . "/";
                $model->sort_id = $model->year;
                $model->fileName = $fileName;

                if (!is_dir($path)) {
                    if (!mkdir($path, 0775, true)) {
                        Yii::$app->session->setFlash('error', 'Error when create directory');
                    }
                }
                if (!$file->saveAs($path . $fileName)) {
                    Yii::$app->session->setFlash('error', 'Error when save file');
                }
                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Successfully created');
                        return $this->refresh();

                    } else {
                        Yii::$app->session->setFlash('error', 'Error created');

                    }
                } else {
                    // Вывод всех ошибок валидации в лог
                    Yii::error($model->getErrors(), __METHOD__);

                    // Или вывести пользователю на экране (временно, для отладки)
                    Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));

                }

            } elseif ($model->subsection_corporate_governance === 'Совет директоров') {

                if (
                    $model->board_subsec === 'Заседание Совета директоров'
                    || $model->board_subsec === 'Корпоративные события'
                ) {
                    $path = Yii::getAlias("@app/../files/pdf/corporate_governance/board-of-directors/$model->board_subsec/$model->year/$model->language_file/");
                    $fileName = uniqid() . "_" . $model->name_url . "." . $file->extension;
                    $model->fileName = $fileName;
                    $model->path_file = $path;
                    $model->ref_corporate_governance = 2;
                    $model->sort_id = $model->board_subsec . "/" . $model->year;

                    if (!is_dir($path)) {
                        if (!mkdir($path, 0775, true)) {
                            Yii::$app->session->setFlash('error', 'Error when create directory');
                        }
                    }
                    if (!$file->saveAs($path . $fileName)) {
                        Yii::$app->session->setFlash('error', 'Error when save file');
                    }
                    if ($model->validate()) {
                        if ($model->save()) {
                            Yii::$app->session->setFlash('success', 'Successfully created');
                            return $this->refresh();

                        } else {
                            Yii::$app->session->setFlash('error', 'Error created');

                        }
                    } else {
                        // Вывод всех ошибок валидации в лог
                        Yii::error($model->getErrors(), __METHOD__);

                        // Или вывести пользователю на экране (временно, для отладки)
                        Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));

                    }
                } elseif ($model->board_subsec === 'Комитеты Совета директоров') {  
                    $model->ref_corporate_governance = 2;
                    if ($model->committee_subsection === 'Положение') {
                        $path = Yii::getAlias("@app/../files/pdf/corporate_governance/board-of-directors/$model->board_subsec/$model->committee_subsection/$model->language_file/");
                        $fileName = uniqid() . '_' . $model->name_url . "." . $file->extension;
                        $model->ref_corporate_governance = 2;
                        $model->path_file = $path;
                        $model->sort_id = $model->committee_subsec . '/' . $model->committee_subsection;
                        if (!is_dir($path)) {
                            if (!mkdir($path, 0775, true)) {
                                Yii::$app->session->setFlash('error', 'Error when create directory!');
                            }
                        }
                        if (!$file->saveAs($path . $fileName)) {
                            Yii::$app->session->setFlash('error', 'Error when save file!');
                        }
                        if (!$model->validate() && !$model->save()) {
                            Yii::$app->session->setFlash('error', 'Error when save data!');

                        }

                    } elseif ($model->committee_subsection === 'План') {

                    } elseif ($model->committee_subsection === 'Заседание') {

                    }

                    $fileName = uniqid() . '_' . $model->name_url . "." . $file->extension;
                    $model->fileName = $fileName;
                    $model->path_file = $path;


                }


            }
        }
        return $this->render('corporate_governance_file', ['model' => $model]);

    }
    // public function actionCopy()
    // {
    //     $from = CorpSoleShareholder::find()->all();
    //     foreach ($from as $item) {
    //         echo $item->name_pdf . "<br>";
    //     }
    //     foreach ($from as $from_item) {
    //         $to = new CorporateGovernanceFile(); // нужно создавать новый объект в каждой итерации

    //         $to->fileName = $from_item->name_pdf . ".pdf";
    //         $to->name_url = $from_item->name_pdf;

    //         $to->language_file = $from_item->lang;
    //         $to->author = 1;
    //         $to->ref_corporate_governance = 1;
    //         $to->sort_id =  (string)$from_item->year; // было $from->year — неправильно
    //         $to->path_file = "/files/pdf/corporate_governance/sole-shareholder/" . $from_item->year . "/" . $from_item->lang . "/";
    //         if (!$to->save()) {
    //             echo "<pre>";
    //             print_r($to->errors);
    //             echo "</pre>";
    //             exit;
    //         }
    //     }
    //     Yii::$app->session->setFlash('success', 'Данные успешно скопированы.');
    //     return $this->redirect(['index']); // укажите нужное действие для редиректа
    // }

    public function actionCorporateSoleShareholder()
    {
        $model = new CorpSoleShareholder();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $pdf = UploadedFile::getInstance(new CorpSoleShareholder(), 'pdf');

                $path = Yii::getAlias("@app/../files/pdf/corporate_governance/sole-shareholder/$model->year/$model->lang/");
                // print_r($path);
                if (!is_dir($path)) {
                    if (!mkdir($path, 0775, true)) {
                        Yii::$app->session->setFlash('error', 'Error when mkdir directory!');
                    }
                }
                if ($pdf->saveAs($path . $model->name_pdf . "." . $pdf->extension)) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Successfully saved!');
                        return $this->refresh();


                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Error when save!');

                }
            }
        }
        return $this->render('corporate-sole-shareholder', ['model' => $model]);
    }


}

