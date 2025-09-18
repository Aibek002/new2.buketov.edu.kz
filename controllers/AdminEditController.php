<?php

namespace app\controllers;

use app\components\LanguageHelper;
use app\models\ApplicantForAcademicTitles;
use app\models\CorporateGovernanceFile;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\DissertationAdvice;
use app\models\Doctorant;
use app\models\Profession;
use app\models\RefCorporateGovernance;
use app\models\RefFiles;
use app\models\RefImage;
use app\models\RefStaff;
use app\models\SkillLevel;
use app\models\TypeRefStaff;
use app\models\User;
use PHPUnit\Framework\TestStatus\Success;
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
            throw new NotFoundHttpException("Staff not found");
        }

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'images');

            if ($model->save()) {
                if ($file) {
                    // Получаем ref_model и ref_image_id
                    $ref_model = RefStaff::find()->select('type')->where(['id' => $model->ref_staff_id])->scalar();
                    $ref_image_id = RefImage::find()->select('id')->where(['page_name' => $ref_model])->scalar();

                    // Ищем изображение по column_id
                    $model_image = Image::find()->where(['column_id' => $model->id])->one();

                    if ($model_image && $model_image->image) {
                        $filePath = Yii::getAlias('@app/..') . $model_image->image;
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                    }

                    if (!$model_image) {
                        $model_image = new Image();
                    }

                    $model_image->column_id = $model->id;
                    $model_image->ref_image_id = $ref_image_id;

                    // Путь для сохранения
                    $path = Yii::getAlias('@app/../files/image_avatar_staff/') . $ref_model . "/" . $model->surname_en . "_" . $model->name_en . "/";

                    if (!is_dir($path) && !mkdir($path, 0777, true)) {
                        throw new \RuntimeException("Не удалось создать директорию: {$path}");
                    }

                    $fileName = trim($model->surname_en) . "_" . trim($model->name_en) . "." . $file->extension;

                    if ($file->saveAs($path . $fileName)) {
                        Yii::$app->session->setFlash("success", "Фото успешно загружено");

                        $model_image->image = "/files/image_avatar_staff/" . $ref_model . "/" . $model->surname_en . "_" . $model->name_en . "/" . $fileName;
                        $model_image->save(false);
                    }
                }

                return $this->redirect(['admin-edit/edit-staff']);
            }
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
    public function actionEditAdmissionFile()
    {
        $model = AdmissionPdf::find()
            ->select([
                'id',
                'name_url as name_url',

            ])
            ->where(['archive' => 0])

            ->asArray()
            ->all();
        // print_r($model);die;
        return $this->render('edit-admission-file', ['model' => $model]);
    }
    public function actionEditFormAdmissionFile($id)
    {
        $model = AdmissionPdf::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("File not found");
        }
        $file = UploadedFile::getInstance($model, 'file');
        $skill_level = SkillLevel::find()->select('type_en')->where(['id' => $model->skill_level_id])->scalar();
        $basePath = Yii::getAlias('@app/../files/pdf/admission/') . strtolower($skill_level) . "/";
        $archivePath = $basePath . "archive/";
        if (!is_dir($archivePath) && !mkdir($archivePath, 0775, true)) {
            throw new \RuntimeException("Не удалось создать папку: $archivePath");
        }
        $oldFile = $basePath . $model->lang_pdf . "/" . $model->path;
        if (is_file($oldFile)) {
            $newArchiveFile = $archivePath . basename($oldFile);
            if (!rename($oldFile, $newArchiveFile)) {
                throw new \RuntimeException("Не удалось переместить файл в архив: $oldFile");
            }
        }
        $model->archive = 1;
        $model->save(false);
        if ($file && Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $newModel = new AdmissionPdf();
            $newModel->ref_sort_order_id = $model->ref_sort_order_id;
            $newModel->skill_level_id = $model->skill_level_id;
            $newModel->lang_pdf = $model->lang_pdf;
            $newModel->path = uniqid() . "_" . $file->baseName . "." . $file->extension;
            $newModel->name_url = $model->name_url;
            $newModel->archive = 0;
            $newModel->author = Yii::$app->user->id;
            if ($newModel->save(false)) {
                $savePath = $basePath . $newModel->lang_pdf . "/" . $newModel->path;
                if ($file->saveAs($savePath)) {
                    return $this->refresh();
                }
            }
        }

        return $this->render('edit-form-admission-file', ['models' => $model]);
    }
    public function actionEditDissertationFile()
    {
        $councils = DissertationAdvice::find()
            ->select(['id', 'name'])
            ->asArray()
            ->all();

        return $this->render('edit-dissertation-file', [
            'councils' => $councils,
        ]);
    }



    public function actionEditFormDissertationFile($id, $doctorant_id = null)
    {
        $model = Files::findOne($id);
        $select_doctorant = null;
        if ($doctorant_id !== null) {
            $dissertation_advice_id = Doctorant::findOne(['id' => $doctorant_id]);
            $select_doctorant = Doctorant::find()
                ->where(['dissertation_id' => $dissertation_advice_id->dissertation_id])
                ->orderBy('full_name_ru')
                ->all();

        }
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($model, 's_file');
                $column = Files::findOne(['id' => $id]);
                $dissertation_advice = "";
                $doctorant = Doctorant::findOne(['id' => $doctorant_id]);

                if ((int) $column->ref_files_id === 2) {
                    $dissertation_advice = DissertationAdvice::findOne(['id' => $column->dissertation_advice_id]);
                } else if ((int) $column->ref_files_id === 1) {
                    $dissertation_advice = DissertationAdvice::findOne(['id' => $doctorant->dissertation_id]);

                } else {
                    print_r('не определенно тип документа : ' . $column->ref_files_id);
                    die;
                }
                $ref_files_id = $column->ref_files_id;

                if ($dissertation_advice !== null) {
                    $faculty = Faculty::findOne(['id' => $dissertation_advice->faculty_id]);
                    $path = Yii::getAlias('@app/../files/pdf/dissertation_advice/') . $faculty->name_ru . "/" . $dissertation_advice->name . "/";

                    if ($ref_files_id == 2) {
                        $path .= 'normative_documents/' . $model->language_file . "/";
                    } elseif ($ref_files_id == 1) {

                        $path .= 'doctorant_documents/' . $doctorant->full_name_en . "/" . $model->language_file . "/";
                    } else {
                        print_r('не определенно тип документа : ' . $path);
                        die;
                    }
                    if (!is_dir($path)) {
                        if (!mkdir($path, 0777, true)) {
                            print_r('Не удалось создать папку : ' . $path);
                            die;
                        }
                    }


                    if (file_exists($model->path_file)) {
                        if (!unlink($model->path_file)) {
                            echo "Ошибка: не удалось удалить старый файл.";
                        }
                    }

                    $fileName = uniqid() . "_" . $file->baseName . "." . $file->extension;
                    if ($file->saveAs($path . $fileName)) {
                        $model->fileName = $file->baseName;
                        $model->path_file = $path . $fileName;
                        if ($model->save(false)) {
                            return $this->redirect(['admin-edit/edit-dissertation-file']);
                        }
                    }

                }

            }
        }

        // print_r($model);die;
        return $this->render('edit-form-dissertation-file', ['model' => $model, 'doctorant' => $select_doctorant]); // Редирект на просмотр, например
    }
    public function actionEditDoctorant()
    {
        $model = Doctorant::find()
            ->select(['id', 'full_name_ru'])
            ->asArray()
            ->all();

        return $this->render('edit-doctorant', [
            'model' => $model,
        ]);
    }
    public function actionEditFormDoctorant($id)
    {
        $model = Doctorant::findOne($id);

        if ($model === null) {
            throw new \yii\web\NotFoundHttpException("Докторант не найден");
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['edit-doctorant', 'id' => $model->id]); // или куда тебе надо
        }

        return $this->render('edit-form-doctorant', [
            'model' => $model,
        ]);
    }

    public function actionEditCorporateFile()
    {
        $model = new CorporateGovernanceFile();
        $type_corporate = RefCorporateGovernance::find()->orderBy('id')->all();
        $share_sole_holder_years = CorporateGovernanceFile::find()->select('sort_id')->where(['ref_corporate_governance' => 1])->distinct()->all();

        return $this->render('edit-corporate-file', ['model' => $model, 'type_corporate' => $type_corporate, 'share_sole_holder_years' => $share_sole_holder_years]);
    }
    public function actionEditFormCorporateFile($id)
    {
        $model = CorporateGovernanceFile::findOne($id);
        $type_corporate = RefCorporateGovernance::find()->orderBy('id')->all();
        $share_sole_holder_years = CorporateGovernanceFile::find()->select('sort_id')->where(['ref_corporate_governance' => 1])->distinct()->all();
        $language = CorporateGovernanceFile::find()->select('language_file')->where(['ref_corporate_governance' => 1])->distinct()->all();
        if (Yii::$app->request->isPost) {
            $file = UploadedFile::getInstance($model, 'file');

            if ($file) {
                $path = str_replace([$model->fileName], "", $model->path_file);
                // print_r($path);
                // die;
                $fileName = uniqid() . "_" . $file->baseName . "." . $file->extension;
                if (!$file->saveAs($path . $fileName)) {
                    print_r("Error when save old file : " . $model->path_file);
                    die;

                }
            }
            if (file_exists($model->path_file . $model->fileName)) {
                if (!unlink($model->path_file . $model->fileName)) {
                    print_r("Error when delete old file : " . $model->path_file);
                }
            }
            $model->fileName = $fileName;
            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $this->refresh();
            }
        }

        return $this->render('edit-form-corporate-file', ['model' => $model, 'type_corporate' => $type_corporate, 'years' => $share_sole_holder_years, 'language' => $language]);
    }
}