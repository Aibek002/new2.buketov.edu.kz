<?php

namespace app\controllers;

use app\models\ApplicantForAcademicTitles;
use app\models\CorporateGovernanceFile;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\Doctorant;
use app\models\Events;
use app\models\FeedbackFormMessage;
use app\models\Profession;
use app\models\RefFiles;
use app\models\RefImage;
use app\models\RefStaff;
use app\models\TypeRefStaff;
use app\models\User;
use finfo;
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
        if ($staff->load(Yii::$app->request->post())) {
            $check = Staff::findOne(['surname_ru' =>  mb_strtoupper(trim($staff->surname_ru)), 'name_ru' =>  mb_strtoupper(trim($staff->name_ru)), 'patronymic_ru' =>  mb_strtoupper(trim($staff->patronymic_ru))]);
            $type_ref_staff = new TypeRefStaff();
            if ($check === null) {
                if ((int) $staff->ref_staff_id === 14 || (int) $staff->ref_staff_id === 15) {
                    $type_ref_staff->staff_id = $staff->id;
                    $type_ref_staff->ref_staff_id = $staff->ref_staff_id;
                    $type_ref_staff->date = $staff->date;
                    $type_ref_staff->faculty_id = $staff->faculty_id;
                    $type_ref_staff->departament_id = $staff->departament_id;
                    $type_ref_staff->email = trim($staff->email);
                    $type_ref_staff->information_kz = $staff->information_kz;
                    $type_ref_staff->information_ru = $staff->information_ru;
                    $type_ref_staff->information_en = $staff->information_en;
                    $type_ref_staff->job_title_en = $staff->job_title_en;
                    $type_ref_staff->job_title_kz = $staff->job_title_kz;
                    $type_ref_staff->job_title_ru = $staff->job_title_ru;

                    $type_ref_staff->save();

                    $staff->name_kz = mb_strtoupper(trim($staff->name_kz));
                    $staff->name_ru = mb_strtoupper(trim($staff->name_ru));
                    $staff->name_en = mb_strtoupper(trim($staff->name_en));

                    $staff->surname_kz = mb_strtoupper(trim($staff->surname_kz));
                    $staff->surname_ru = mb_strtoupper(trim($staff->surname_ru));
                    $staff->surname_en = mb_strtoupper(trim($staff->surname_en));


                    $staff->email = mb_strtolower(trim($staff->email));
                    $staff->save();
                } elseif ((int) $staff->ref_staff_id === 6 || (int) $staff->ref_staff_id === 1 || (int) $staff->ref_staff_id === 2 || (int) $staff->ref_staff_id === 3 || (int) $staff->ref_staff_id === 5) {
                    if ($staff->save(false)) {  // Сначала сохраняем staff, чтобы получить id
                        $type_ref_staff->staff_id = $staff->id;
                        $type_ref_staff->ref_staff_id = $staff->ref_staff_id;
                        $type_ref_staff->job_title_en = trim($staff->job_title_en);
                        $type_ref_staff->job_title_kz = trim($staff->job_title_kz);
                        $type_ref_staff->job_title_ru = trim($staff->job_title_ru);
                        $type_ref_staff->faculty_id = $staff->faculty_id;
                        $type_ref_staff->departament_id = $staff->departament_id;
                        $type_ref_staff->email = $staff->email;
                        $type_ref_staff->information_kz = $staff->information_kz;
                        $type_ref_staff->information_ru = $staff->information_ru;
                        $type_ref_staff->information_en = $staff->information_en;
                        if (!$type_ref_staff->save()) {


                        }
                    }
                }
            } else {
                $check_ref_staff_type = TypeRefStaff::findOne([
                    'ref_staff_id' => $staff->ref_staff_id,
                    'staff_id' => $check->id,
                ]);
                if ($check_ref_staff_type === null) {

                    $type_ref_staff->staff_id = $check->id;
                    $type_ref_staff->job_title_en = trim($staff->job_title_en);
                    $type_ref_staff->job_title_ru = trim($staff->job_title_ru);
                    $type_ref_staff->job_title_kz = trim($staff->job_title_kz);
                    $type_ref_staff->faculty_id = $staff->faculty_id;
                    $type_ref_staff->departament_id = $staff->departament_id;
                    $type_ref_staff->email = mb_strtolower(trim($staff->email));
                    $type_ref_staff->information_kz = $staff->information_kz;
                    $type_ref_staff->information_ru = $staff->information_ru;
                    $type_ref_staff->information_en = $staff->information_en;
                    $type_ref_staff->ref_staff_id = $staff->ref_staff_id;
                    $type_ref_staff->date = $staff->date;
                    $type_ref_staff->save();
                } else {
                    Yii::$app->session->setFlash('error', 'Такой пользователь уже существует!');
                }
            }
            $file = UploadedFile::getInstance($staff, 'images');
            if ($file) {
                $ref_staff = RefStaff::findOne(['id' => $staff->ref_staff_id]);
                $type = $ref_staff->type;
                $staff_id = $staff->id ??   $check->id;

                $path = Yii::getAlias('@app/../files/staff_avatar/') .
                    $staff_id . "/";

                if (!is_dir($path)) {
                    mkdir($path, 0775, true);
                }

                $filePath = uniqid() . "." . $file->extension;
                $image_model = new Image();
                $image_model->ref_image_id = RefImage::find()->select('id')->where(['page_name' => $type])->scalar();

                $image_model->column_id = $staff_id;
                $image_model->image = "/files/staff_avatar/" . $staff_id . "/" . $filePath;
                if ($image_model->save(false)) {
                    if ($file->saveAs($path . $filePath)) {
                        Yii::$app->session->setFlash('success', 'Successfully created!');
                        return $this->refresh();

                    }

                } else {
                    Yii::error($image_model->getErrors(), __METHOD__);
                    print_r($image_model->getErrors());
                    die;
                }

            }
            return $this->redirect(['admin/index']);
        }
        return $this->render('staff-admin-panel', ['model' => $staff]);

    }
    public function actionDoctorantAdminPanel()
    {
        $doctorant = new Doctorant();

        if ($doctorant->load(Yii::$app->request->post())) {
            $doctorant->author = Yii::$app->user->id;
            if ($doctorant->save()) {
                return $this->redirect(['admin/index']);

            }
        }
        return $this->render('doctorant-admin-panel', ['model' => $doctorant]);

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
                        $model->fileName = $fileName;
                        if (!is_dir($path)) {
                            if (!mkdir($path, 0775, true)) {
                                Yii::$app->session->setFlash('error', 'Error when create directory!');
                            }
                        }
                        if (!$file->saveAs($path . $fileName)) {
                            Yii::$app->session->setFlash('error', 'Error when save file!');
                        }
                        if (!$model->validate()) {
                            print_r($path);

                            Yii::error($model->getErrors(), __METHOD__);
                            Yii::$app->session->setFlash('error', JSON_UNESCAPED_UNICODE);

                        } else {
                            if (!$model->save()) {
                                Yii::error($model->getErrors(), __METHOD__);
                                Yii::$app->session->setFlash('error', JSON_UNESCAPED_UNICODE);
                            } else {
                                Yii::$app->session->setFlash('success', 'Successfylly created!');
                                return $this->refresh();
                            }
                        }

                    } elseif ($model->committee_subsection === 'План' || $model->committee_subsection === 'Заседание') {
                        $path = Yii::getAlias("@app/../files/pdf/corporate_governance/board-of-directors/$model->board_subsec/$model->committee_subsection/$model->year/$model->language_file/");
                        $fileName = uniqid() . '_' . $model->name_url . "." . $file->extension;
                        $model->fileName = $fileName;
                        $model->path_file = $path;
                        $model->sort_id = $model->committee_subsec . "/" . $model->committee_subsection;
                        if (!is_dir($path)) {
                            if (!mkdir($path, 0775, true)) {
                                Yii::$app->session->setFlash('error', 'Error when create directory!');
                            }
                        }
                        if (!$file->saveAs($path . $fileName)) {
                            Yii::$app->session->setFlash('error', 'Error when save file!');
                        }
                        if (!$model->validate()) {
                            Yii::error(json_encode($model->getErrors()), __METHOD__);
                            Yii::$app->session->setFlash('error', JSON_UNESCAPED_UNICODE);
                        } else {
                            if (!$model->save()) {
                                Yii::error(json_encode($model->getErrors()), __METHOD__);
                                Yii::$app->session->setFlash('error', JSON_UNESCAPED_UNICODE);
                            } else {
                                Yii::$app->session->setFlash('success', 'Successfully created!');
                                return $this->refresh();
                            }
                        }
                    }
                } elseif ($model->board_subsec === 'Корпоративные события') {
                    $model->sort_id = $model->board_subsec . '/' . $model->year;
                    $model->path_file = '/';
                    $model->fileName = "Null";
                    $model->ref_corporate_governance = 2;
                    $model->author = Yii::$app->user->id;
                    $model->name_url = $model->date;

                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Successfully created');
                        return $this->refresh();
                    } else {
                        Yii::error($model->getErrors(), __METHOD__);
                        Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));

                    }
                }


            } elseif ($model->subsection_corporate_governance === 'Правление') {
                $path = Yii::getAlias("@app/../files/pdf/corporate_governance/governance/$model->year/$model->language_file/");
                $fileName = uniqid() . "_" . $model->name_url . "." . $file->extension;
                $model->ref_corporate_governance = 3;
                $model->path_file = "/files/pdf/corporate_governance/governance/" . $model->year . "/" . $model->language_file . "/";
                $model->sort_id = 'Заседание правления/' . $model->year;
                $model->fileName = $fileName;

                if (!is_dir($path)) {
                    if (!mkdir($path, 0775, true)) {
                        Yii::$app->session->setFlash('error', 'Error when create directory');
                    }
                }
                Yii::error(print_r($_FILES, true), __METHOD__);

                if (!$file->saveAs($path . $fileName)) {
                    Yii::$app->session->setFlash('error', 'File save failed. See logs for details.');
                }
                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Successfully created');
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('error', 'Error created');
                    }
                } else {
                    Yii::error($model->getErrors(), __METHOD__);
                    Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));
                }
            } elseif ($model->subsection_corporate_governance === 'Корпоративные документы') {
                $path = Yii::getAlias("@app/../files/pdf/corporate_governance/corporate_documents/" . $model->subsec_corp_docs . '/' . $model->year . '/' . $model->language_file . "/");

                $fileName = uniqid() . '_' . $model->name_url . '.' . $file->extension;
                $model->fileName = $fileName;
                $model->path_file = str_replace(['/var/www/html/yii2/', '..'], '', $path);
                $model->ref_corporate_governance = 4;
                $model->sort_id = $model->subsec_corp_docs . '/' . $model->year;

                if (!is_dir($path)) {
                    if (!mkdir($path, 0775, true)) {
                        Yii::$app->session->setFlash('error', 'Error when create directory');
                    }
                }

                if (!$file->saveAs($path . $fileName)) {
                    Yii::$app->session->setFlash('error', 'File save failed. See logs for details.');
                }
                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'Successfully created');
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('error', 'Error created');
                    }
                } else {
                    Yii::error($model->getErrors(), __METHOD__);
                    Yii::$app->session->setFlash('error', json_encode($model->getErrors(), JSON_UNESCAPED_UNICODE));
                }
            }
        }
        return $this->render('corporate_governance_file', ['model' => $model]);

    }
    public function actionDissertationAdvice()
    {
        $model = new Files();
        if ($model->load(Yii::$app->request->post())) {
            $files = UploadedFile::getInstances($model, 'files');
            $staff_info = Doctorant::find()
                ->select(['faculty.name_ru AS faculty_name', 'dissertation_advice.name as dissertation_name', 'doctorant.full_name_ru AS doctorant_full_name'])
                ->innerJoin('dissertation_advice', 'dissertation_advice.id = doctorant.dissertation_id')
                ->innerJoin('faculty', 'faculty.id = dissertation_advice.faculty_id')
                ->where(['doctorant.id' => $model->doctorant_id])
                ->asArray()
                ->one();
            $basePath = Yii::getAlias("@app/../files/pdf/dissertation_advice/");
            if ($model->type === 'normative') {
                $basePath .= "normative_documents/";

            } elseif ($model->type === 'doctorant') {
                $basePath .=
                    $staff_info['faculty_name'] . "/" . $staff_info['dissertation_name'] . "/"
                    . $staff_info['doctorant_full_name'] . "/";

            }
            // print_r('Path: ' . $basePath);
            // die;


            if (!is_dir($basePath)) {
                mkdir($basePath, 0775, true);
            }


            $i = 1;
            foreach ($files as $file) {
                $fileModel = new Files();
                if ($model->type === 'normative') {
                    $fileModel->ref_files_id = 2;
                    $fileModel->dissertation_advice_id = $model->dissertation_advice_id;


                } elseif ($model->type === 'doctorant') {
                    $fileModel->doctorant_id = $model->doctorant_id;
                    $fileModel->ref_files_id = 1;
                }

                $fileModel->author = Yii::$app->user->id;

                $fileModel->status = 1;
                $fileModel->language_file = $model->language_file;

                // имя файла
                $fileName = $file->baseName . "." . $file->extension;

                $fileModel->path_file = $basePath . $fileName;
                $fileModel->fileName = $fileName;

                if (!$fileModel->save()) {
                    var_dump($fileModel->errors);
                    exit;
                } else {
                    $file->saveAs($basePath . $fileName);
                }

                $i++;
            }
            return $this->refresh();


        }


        return $this->render('dissertation-advice', ['model' => $model]);
    }
    public function actionApplicantForAcademicTitles()
    {
        $model = new Files();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstances($model, 'files');
            $type = RefFiles::find()->select('type')->where(['id' => $model->ref_files_id])->scalar();
            $professor = Staff::find()->select('surname_ru')->where(['id' => $model->professor_id])->scalar();
            $path = Yii::getAlias('@app/../files/pdf/applicant_for_academic_titles/') . $type . '/' . $professor . '/' . $model->language_file . '/';
            if (!is_dir($path)) {
                if (!mkdir($path, 0775, true)) {
                    Yii::$app->session->setFlash('error', 'Error when create directory ' . $path);
                }
            }
            foreach ($file as $file_item) {
                $fileModel = new Files();
                $fileModel->path_file = $path;
                $fileModel->author = Yii::$app->user->id;
                $fileModel->language_file = $model->language_file;
                $fileModel->fileName = $file_item->baseName . '.' . $file_item->extension;
                $fileModel->ref_files_id = $model->ref_files_id;
                $fileModel->professor_id = $model->professor_id;
                if ($file_item->saveAs($path . $file_item->baseName . '.' . $file_item->extension)) {
                    if (!$fileModel->save()) {
                        Yii::error($file_item->getErrors(), __METHOD__);
                        Yii::$app->session->setFlash('error', json_encode($fileModel->getErrors(), JSON_UNESCAPED_UNICODE));
                    } else {
                        Yii::$app->session->setFlash('success', 'Successfully created!');

                    }
                }
            }
            return $this->refresh();

        }


        return $this->render('applicant-for-academic-titles', ['model' => $model]);
    }
    public function actionAcademicCouncilsForm()
    {
        $model = new Files();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $path = "";
            if ($model->type === "Sample design of the list of works" || $model->type === "Composition of the Council for the current year" || $model->type === "The Council's work plan for the current year") {
                $path = Yii::getAlias("@app/../files/pdf/academic-council/$model->type/$model->language_file/");

            } elseif ($model->type === "Draft decisions of the Academic Council" || $model->type === "Report of the Chairman of the Management Board") {
                $path = Yii::getAlias("@app/../files/pdf/academic-council/$model->type/$model->years/$model->language_file/");

            }
            if (!is_dir($path)) {
                if (!mkdir($path, 0775, true)) {
                    Yii::$app->session->setFlash("error", "error when create directory: " . $path);
                }
            }
            $files = UploadedFile::getInstances($model, 'files');
            foreach ($files as $file) {
                $fileModel = new Files();
                $fileModel->path_file = $path;
                $fileModel->fileName = uniqid() . "_" . $file->baseName . "." . $file->extension;
                $fileModel->author = Yii::$app->user->id;
                $fileModel->sort_id = $model->years ? $model->type . "/" . $model->years : $model->type;
                $fileModel->ref_files_id = 5;
                $fileModel->language_file = $model->language_file;
                if ($fileModel->save()) {
                    if ($file->saveAs($path . $fileModel->fileName)) {
                        Yii::$app->session->setFlash("success", "Successfully created!");

                    } else {
                        Yii::$app->session->setFlash("error", "Errors created!");

                    }
                }

            }
            return $this->refresh();

        }
        return $this->render('academic-councils-form', ["model" => $model]);
    }
    // public function actionAddProfessor()
    // {
    //     $model = new ApplicantForAcademicTitles();
    //     if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
    //         $model->author = Yii::$app->user->id;
    //         if ($model->save()) {
    //             Yii::$app->session->setFlash('success', 'Successfully created!');
    //             return $this->refresh();
    //         }
    //     }
    //     return $this->render('add-professor', ['model' => $model]);
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
    public function actionAddEvents()
    {
        $events = new Events();
        if (Yii::$app->request->isPost && $events->load(Yii::$app->request->post()) && $events->save()) {
            Yii::$app->session->setFlash('success', 'successfully created!');
            return $this->refresh();
        }
        return $this->render('add-events', ['model' => $events]);
    }
    public function actionAllMessages()
    {
        $messages = FeedbackFormMessage::find()->where(['status' => 0])->andWhere(['type_message' => 'question'])->all();
        return $this->render('all-messages', ['messages' => $messages]);
    }
    public function actionAnswerFeedback($id)
    {
        $feedback = FeedbackFormMessage::findOne($id);
        $answer = new FeedbackFormMessage();
        if (Yii::$app->request->isPost() && $answer->load(Yii::$app->request->post())) {
            $send = Yii::$app->mailer->compose()
                ->setFrom('aibekseitzhan002@mail.ru')
                ->setTo($feedback->email)
                ->setSubject($answer->title)
                ->setTextBody($answer->message)
                ->send();
            if ($send) {
                $answer->email = 'aibekseitzhan002@mail.ru';
                $answer->question_id = $id;
                $answer->type_message = 'answer';
                $answer->save();
            }
        }
        return $this->render('answer-feedback', ['model' => $answer]);

    }
    public function actionShowFeedback($id)
    {
        // обновляем вопрос
        FeedbackFormMessage::updateAll(['status' => 1], ['id' => $id]);

        // обновляем все ответы
        FeedbackFormMessage::updateAll(['status' => 1], ['question_id' => $id]);
        return $this->redirect(['admin/all-messages']);

    }
    public function actionAddSmiAboutUs()
    {
        $model = new \app\models\SmiAboutUs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Запись успешно добавлена.');
            return $this->redirect(['admin/index']); // или куда тебе нужно
        }

        return $this->render('add-smi-about-us', [
            'model' => $model,
        ]);
    }
}


