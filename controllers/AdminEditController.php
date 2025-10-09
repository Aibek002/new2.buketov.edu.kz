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
        $model = HistoryFaculty::findOne(['id' => $id]);

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
                'staff.id as staff_id',
                'type_ref_staff.id as type_ref_staff_id',

                'staff.name_ru as name',
                'staff.surname_ru as surname',
                'staff.patronymic_ru as patronymic',
                'ref_staff.type as job_title',
                'type_ref_staff.ref_staff_id as ref_staff_id',

            ])
            ->innerJoin('type_ref_staff', 'type_ref_staff.staff_id = staff.id')
            ->innerJoin('ref_staff', 'ref_staff.id = type_ref_staff.ref_staff_id')

            ->orderBy(new \yii\db\Expression("SUBSTRING(staff.name_ru, 9) ASC"))
            ->asArray()
            ->distinct(['type_ref_staff.ref_staff_id', 'type_ref_staff.staff_id'])
            ->all();
        // print_r($model);die;
        return $this->render('edit-staff', ['model' => $model]);
    }
    public function actionEditFormStaff($id, $type_ref_staff_id = null, $ref_staff_id = null)
    {
        $staff = Staff::findOne(['id' => $id]);

        if ($staff === null) {
            throw new NotFoundHttpException("Staff not found");
        }

        // Если не найден связанный type_ref_staff — создаём новый
        $type_ref_staff = TypeRefStaff::findOne([
            'staff_id' => (int) $id,
            'id' => (int) $type_ref_staff_id,
            'ref_staff_id' => (int) $ref_staff_id
        ]);

        if ($type_ref_staff === null) {
            $type_ref_staff = new TypeRefStaff();
            $type_ref_staff->staff_id = $id;
            if ($ref_staff_id !== null) {
                $type_ref_staff->ref_staff_id = $ref_staff_id;
            }
        }

        if (
            Yii::$app->request->isPost &&
            $staff->load(Yii::$app->request->post()) &&
            $type_ref_staff->load(Yii::$app->request->post())
        ) {
            $isValid = $staff->validate();
            $isValid = $type_ref_staff->validate() && $isValid;

            $file = UploadedFile::getInstance($staff, 'images');

            if ($isValid) {
                $staff->save(false);
                $type_ref_staff->staff_id = $staff->id; // на всякий случай, чтобы связь сохранялась корректно
                $type_ref_staff->save(false);

                // Если загружен файл
                if ($file) {
                    $path = Yii::getAlias('@app/../files/staff_avatar/') . $staff->id . "/";
                    $file_name = uniqid() . "." . $file->extension;
                    // print_r($file_name);
                    // die;

                    if (!is_dir($path) && !mkdir($path, 0777, true)) {
                        Yii::$app->session->setFlash("error", "Ошибка при создании директории: " . $path);
                    } else {
                        $image = Image::findOne(['column_id' => $staff->id]);

                        if (!$image) {
                            // Если нет — создаём новую
                            $image = new Image();
                            $image->column_id = $staff->id;
                        }

                        // Сохраняем путь к файлу
                        $image->image = '/files/staff_avatar/' . $staff->id . "/" . $file_name;
                        if ($file->saveAs($path . $file_name)) {
                            // Сохраняем запись в базу
                            if ($image->save(false)) {
                                Yii::$app->session->setFlash('success', 'Изображение успешно обновлено!');
                            } else {
                                Yii::$app->session->setFlash('error', 'Ошибка при сохранении изображения.');
                            }
                        }else{
                                Yii::$app->session->setFlash('error', 'Ошибка при сохранении изображения.');

                        }

                    }
                }

                return $this->redirect(['admin-edit/edit-staff']);
            }
        }



        return $this->render('edit-form-staff', ['staff' => $staff, 'type_ref_staff' => $type_ref_staff]);
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

    public function actionPhotoMove()
    {
        $staff = Staff::findAll(['ref_staff_id' => 5]);

        foreach ($staff as $staff_item) {
            $image = Image::findOne([
                'ref_image_id' => 9,
                'column_id' => $staff_item->id
            ]);

            if ($image !== null) {
                $file = Yii::getAlias('@app/../') . ltrim($image->image, '/'); // путь к файлу

                if (file_exists($file)) {
                    echo "Картина существует <br/>";
                    $targetDir = Yii::getAlias('@app/../files/staff_avatar/' . $staff_item->id . '/');
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $destination = $targetDir . uniqid() . '.' . $ext;

                    if (copy($file, $destination)) {
                        echo "Файл успешно скопирован!";
                    } else {
                        echo "Ошибка при копировании файла!";
                    }

                } else {
                    echo "Картина не существует <br/>";

                }
            } else {
                echo "Нет картинки для staff_id {$staff_item->id}<br/>";
            }

        }
    }
}