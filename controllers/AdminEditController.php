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
        $model_image = new Image();

        if (!$model) {
            throw new NotFoundHttpException("Staff not found");
        }

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'images');

            if ($model->save()) {
                // Только если файл загружен
                if ($file) {
                    $ref_model = RefStaff::find()->select('type')->where(['id' => $model->ref_staff_id])->scalar();
                    $ref_image_id = RefImage::find()->select('id')->where(['page_name' => $ref_model])->scalar();

                    $model_image->column_id = $model->id;
                    $model_image->ref_image_id = $ref_image_id;

                    // Безопасное имя папки
                    $path = Yii::getAlias('@app/../files/image_avatar_staff/') . $ref_model . "/" . $model->surname_en . "_" . $model->name_en . "/";

                    if (!is_dir($path) && !mkdir($path, 0777, true)) {
                        throw new \RuntimeException("Не удалось создать директорию: {$path}");
                    }

                    $fileName = $model->surname_en . "_" . $model->name_en . "." . $file->extension;
                    if ($file->saveAs($path . $fileName)) {
                        Yii::$app->session->setFlash("success", "Фото успешно загружено");
                        $model_image->image = "/files/image_avatar_staff/" . $ref_model . "/" . $model->surname_en . "_" . $model->name_en . "/" . $fileName; // если у тебя есть колонка для хранения пути
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

        // Создать архивную папку если её нет
        if (!is_dir($archivePath) && !mkdir($archivePath, 0775, true)) {
            throw new \RuntimeException("Не удалось создать папку: $archivePath");
        }

        // Архивируем старый файл
        $oldFile = $basePath . $model->lang_pdf . "/" . $model->path;
        if (is_file($oldFile)) {
            $newArchiveFile = $archivePath . basename($oldFile);
            if (!rename($oldFile, $newArchiveFile)) {
                throw new \RuntimeException("Не удалось переместить файл в архив: $oldFile");
            }
        }

        // Помечаем модель как архивированную
        $model->archive = 1;
        $model->save(false);

        // Создаём новую запись для нового файла
        if ($file) {
            $newModel = new AdmissionPdf();
            $newModel->ref_sort_order_id = $model->ref_sort_order_id;
            $newModel->skill_level_id = $model->skill_level_id;
            $newModel->lang_pdf = $model->lang_pdf;
            $newModel->path = uniqid() . "_" . $file->baseName . "." . $file->extension;
            $newModel->name_url = $file->baseName;
            $newModel->archive = 0;


            if ($newModel->save()) {
                $savePath = $basePath . $newModel->lang_pdf . "/" . $newModel->path;
                $file->saveAs($savePath);
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

    // Получить нормативные документы
    public function actionGetNormativeDocs($council_id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        print_r($council_id);
        die;
        $docs = Files::find()
            ->where(['ref_files_id' => $council_id])
            ->select(['id', 'title'])
            ->asArray()
            ->all();

        return $docs;
    }

    // Получить докторантов
    public function actionEditFormDissertationFile($id, $doctorant_id = null)
{
    $model = Files::findOne($id);

    if (!$model) {
        throw new NotFoundHttpException("File not found");
    }

    $file = UploadedFile::getInstance($model, 'file');
    if ($file) { // Проверяем, был ли загружен новый файл

        // Определяем базовый путь
        $basePath = "";
        if ($model->ref_sort_order_id == 2) {
            $basePath = Yii::getAlias('@app/../files/pdf/dissertation_advice/normative_documents/');
        } else { // Тут исправил условие на else, потому что дважды ==2
            $diss_advice = DissertationAdvice::find()->select(['name', 'faculty_id'])->where(['dissertation_id' => $model->dissertation_id])->one();
            $faculty_name = Faculty::find()->select(['name_ru'])->where(['id' => $diss_advice->faculty_id])->scalar();
            $doctorant = Doctorant::find()->select(['full_name_ru'])->where(['id' => $doctorant_id])->scalar();
            $basePath = Yii::getAlias('@app/../files/pdf/dissertation_advice/') . $faculty_name . "/" . $diss_advice->name . "/" . $doctorant . "/" . $model->language_file . "/";
        }

        $archivePath = $basePath . "archive/";

        // Создать архивную папку если её нет
        if (!is_dir($archivePath) && !mkdir($archivePath, 0775, true)) {
            throw new \RuntimeException("Не удалось создать папку: $archivePath");
        }

        // Архивируем старый файл
        $oldFile = $model->path_file;
        if (is_file($oldFile)) {
            $newArchiveFile = $archivePath . basename($oldFile);
            if (!rename($oldFile, $newArchiveFile)) {
                throw new \RuntimeException("Не удалось переместить файл в архив: $oldFile");
            }
        }

        // Сохраняем новый файл
        $newFilePath = $basePath . $file->name;
        if (!is_dir($basePath)) {
            mkdir($basePath, 0775, true);
        }

        if (!$file->saveAs($newFilePath)) {
            throw new \RuntimeException("Не удалось сохранить новый файл: $newFilePath");
        }

        // Обновляем путь в модели
        $model->path_file = $newFilePath;
        if(!$model->save(false)){
            throw new \RuntimeException("Не удалось сохранить BD файл:");

        }
    }

    return $this->render('edit-form-dissertation-file',[ 'model' => $model]); // Редирект на просмотр, например
}

}