<?php

namespace app\controllers;
use app\models\AdmissionPdf;
use app\models\CorporateGovernanceFile;
use app\models\CorpSoleShareholder;
use app\models\Departament;
use app\models\DissertationAdvice;
use app\models\FeedbackForm;
use app\models\FeedbackFormMessage;
use app\models\Files;
use app\models\Profession;
use app\models\Events;
use app\models\SmiAboutUs;
use Symfony\Component\BrowserKit\History;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Faculty;
use app\models\Staff;
use app\models\Article;
use app\models\Subject;
use app\models\News;


use app\models\HistoryFaculty;
use app\models\HistoryDepartament;
use yii\helpers\Html;
use \app\components\LanguageHelper;

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
            'language' => [
                'class' => \app\components\LanguageBehavior::class,
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

        $form = new FeedbackForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $sent = Yii::$app->mailer->compose()
                ->setFrom('aibekseitzhan002@mail.ru')
                ->setTo('aibekseitzhan002@gmail.com')
                ->setSubject('Тестовое письмо')
                ->setTextBody('Привет! Это тест из Yii2 через Symfony Mailer 🚀')
                ->setHtmlBody('<h1>Привет!</h1><p>Это тестовое письмо.</p>')

                ->send();
            if ($sent) {
                $feedback = new FeedbackFormMessage();
                $feedback->email = $form->email;
                $feedback->title = $form->title;
                $feedback->message = $form->message;
                $feedback->type_message = 'question';
                $feedback->save();

            } else {
                Yii::error("Ошибка при отправке письма", __METHOD__);
            }


            Yii::$app->session->setFlash('success', 'Письмо успешно отправлено!');
            return $this->refresh();
        }
        $news_for_home = News::find()
            ->select([
                LanguageHelper::title() . ' AS title',
                LanguageHelper::content() . ' AS content',
                'date',
                'image'
            ])
            ->innerJoin('image', 'image.column_id = news.id AND image.ref_image_id = 1')
            ->orderBy(['news.id' => SORT_DESC])
            ->limit(3)
            ->asArray()
            ->all();
        $current_date = (new \yii\db\Expression('CURDATE()'));

        $events = Events::find()
            ->select([
                LanguageHelper::title() . ' AS title',
                LanguageHelper::content() . ' AS content',
                new \yii\db\Expression('DAY(time_events) as day'),
                new \yii\db\Expression('MONTH(time_events) as month'),
                new \yii\db\Expression('YEAR(time_events) as year'),

            ])
            ->where(['>', 'time_events', $current_date])
            ->orderBy([
                'time_events' => SORT_ASC,
            ])
            ->asArray()
            ->limit(3)
            ->all();
        $smi = SmiAboutUs::find()
            ->select([
                LanguageHelper::title() . ' AS title',
                LanguageHelper::content() . ' AS content',
            ])
            ->asArray()
            ->limit(3)
            ->all();
        $rector = Staff::findOne(['ref_staff_id' => 1]);

        return $this->render('index', ['news' => $news_for_home, 'events' => $events, 'model' => $form, 'rector' => $rector,'smi'=>$smi]);

    }
    public function actionFaculty($name)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $faculty = Faculty::findOne(['name_ru' => $name]);
        $faculty_id = $faculty->id;
        $dean = Staff::find()
            ->select(['image.image', 'staff.*'])
            ->joinWith(['refStaff', 'image']) // связи из модели Staff
            ->where([
                'staff.faculty_id' => $faculty_id,
                'ref_staff.type' => 'dean',
            ])
            ->one();

        $departament = Departament::findAll(['faculty_id' => $faculty_id]);
        return $this->render('faculty', ['faculty' => $faculty, 'dean' => $dean, 'departament' => $departament, 'faculty_id' => $faculty_id, 'name' => $name]);
    }

    public function actionHistoryFaculty($faculty_id)
    {
        $lang = Yii::$app->language;

        $article = HistoryFaculty::find()

            ->where([
                'faculty_id' => $faculty_id,

            ])
            ->one();

        return $this->render('article', ['model' => $article]);

    }
    public function actionDepartament($departament_id)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $departament = Departament::findOne(['id' => $departament_id]);
        $teachers = (new \yii\db\Query())
            ->select([
                'name' => LanguageHelper::name(),
                'surname' => LanguageHelper::surname(),
                'patronymic' => LanguageHelper::patronymic(),
                'patronymic' => LanguageHelper::patronymic(),
                'information' => LanguageHelper::information(),
                'job_title' => LanguageHelper::job_title(),
                'email'


            ])->from('staff')
            ->innerJoin('ref_staff', ' ref_staff.id = staff.ref_staff_id ')
            ->where(['departament_id' => $departament_id])
            ->orderBy(LanguageHelper::name())
            ->all();
        return $this->render('departament', ['departament' => $departament, 'departament_id' => $departament_id, 'teachers' => $teachers]);
    }
    public function actionHistoryDepartament($departament_id)
    {
        $lang = Yii::$app->language;
        // 'select name_ . $lang , '

        $departament = HistoryDepartament::findOne(['departament_id' => $departament_id]);

        ;
        return $this->render('history-departament', ['model' => $departament]);
    }
    public function actionArticle($type, $title)
    {
        $lang = Yii::$app->language;

        $article = Article::find()
            ->joinWith(['refArticle']) // 'refArticle' — имя связи в модели Article
            ->where([
                'ref_article.type' => $type,
                'article.title_en' => $title,
            ])
            ->one();

        return $this->render('article', ['model' => $article]);

    }
    public function actionManagementStructure($type)
    {
        $lang = Yii::$app->language;
        $staff = Staff::find()
            ->joinWith(['refStaff', 'image.refImage'])
            ->where(['ref_staff.type' => $type])
            ->andWhere(['ref_image.page_name' => $type])
            ->all();
        // print_r($staff);
        // die;
        return $this->render('management-structure', ['model' => $staff, 'type' => $type]);

    }


    public function actionCorparate()
    {
        $year = CorporateGovernanceFile::find()->select(['sort_id', 'language_file', 'ref_corporate_governance'])->distinct()->orderBy(['sort_id' => SORT_DESC])->all();
        // $pdf = CorpSoleShareholder::find()->all();
        $pdf = CorporateGovernanceFile::find()
            ->orderBy(['sort_id' => SORT_DESC, 'fileName' => SORT_DESC])->all();
        return $this->render('corparate', ['year' => $year, 'pdf' => $pdf]);
    }

    public function actionSovet()
    {
        $documents = Files::find()->where(['ref_files_id' => 5, 'language_file' => Yii::$app->language])->all();

        return $this->render('sovet', ['documents' => $documents]);
    }
    public function actionAdmission($type)
    {
        $subjects = Subject::find()->orderBy(LanguageHelper::name())->all();
        $profession_university = Profession::find()->orderBy(LanguageHelper::name())->all();
        $pdf = AdmissionPdf::find()
            ->orderBy('ref_sort_order_id')
            ->where(['archive' => 0])
            ->asArray()
            ->all();

        return $this->render('admission', [
            'subjects' => $subjects,
            'profession_university' => $profession_university,
            'type' => $type,
            'pdf' => $pdf
        ]);
    }

    public function actionInternationalStudents()
    {
        return $this->render('international-students');
    }
    public function actionImg()
    {
        return $this->render('img');
    }
    public function actionOpenGeneralPdf($path, $url, $year = null)
    {
        $params = [
            'url' => $url,
            'path' => $path

        ];
        if ($year !== null) {
            $params['year'] = $year;
        }

        return $this->render('open-general-pdf', ['params' => $params]);
    }
    public function actionDissertationAdvice($dissertation_id)
    {
        // $staff_id = Faculty::find()->select(
        //     [
        //         'staff.' . LanguageHelper::name(),
        //         'staff.' . LanguageHelper::surname(),
        //         'staff.' . LanguageHelper::patronymic(),

        //     ]
        // )->innerJoin('staff', "staff.faculty_id=faculty.id")->where(['faculty.id' => $faculty_id])->all();
        $id = DissertationAdvice::find()
            ->select('faculty_id')
            ->where(['id' => $dissertation_id])
            ->scalar();

        $name = DissertationAdvice::find()
            ->select('name')
            ->where(['id' => $dissertation_id])
            ->scalar();

        $files = Faculty::find()
            ->select([
                'doctorant.id AS doctorant_id',

                'doctorant.full_name_' . Yii::$app->language . ' AS doctorant_full_name',

                'files.fileName',
                'files.path_file'
            ])
            ->innerJoin('dissertation_advice', 'dissertation_advice.faculty_id = faculty.id')
            ->innerJoin('doctorant', 'doctorant.dissertation_id = dissertation_advice.id')
            ->innerJoin('files', 'files.doctorant_id = doctorant.id')
            ->where(['faculty.id' => $id, 'dissertation_id' => $dissertation_id, 'language_file' => Yii::$app->language, 'ref_files_id' => 1])
            ->asArray()
            ->all();
        // $secretary = Staff::find()->where(['dissertation_advice_id' => $dissertation_id])->one();
        $secretary = Staff::find()
            ->select([
                'id',
                LanguageHelper::surname() . ' as surname',
                LanguageHelper::name() . ' as name',
                LanguageHelper::patronymic() . ' as patronymic',
                LanguageHelper::job_title() . ' as job_title',
                LanguageHelper::information() . ' as information',
                'email',
                'phone'
            ])

            ->where(['dissertation_advice_id' => $dissertation_id])
            ->asArray()
            ->one();
        $normative = Files::find()->where(['dissertation_advice_id' => $dissertation_id, 'language_file' => Yii::$app->language, 'ref_files_id' => 2])->all();
        // print_r($normative);
        // die;
        // $staff = Staff::find()
        //     ->where(['faculty_id' => $faculty_id])
        //     ->all();

        // $files = Files::find()
        //     ->where(['staff_id' => array_column($staff, 'id') , 'language_file'=>Yii::$app->language])
        //     ->all();

        return $this->render('dissertation-advice', ['dissertation' => $files, 'dissertation_name' => $name, 'secretary' => $secretary, 'normative' => $normative]);
    }
    public function actionApplicantAcademicTitles()
    {
        $professor = Files::find()->select(
            [
                'ref_files_id',
                'staff.surname_' . Yii::$app->language . ' as surname',
                'staff.name_' . Yii::$app->language . ' as name',
                'staff.patronymic_' . Yii::$app->language . ' as patronymic',
                'type_ref_staff.date',
                'files.path_file',
                'files.fileName'
            ]
        )
            ->innerJoin('staff', 'files.professor_id = staff.id')
            ->innerJoin('type_ref_staff', 'type_ref_staff.staff_id = staff.id')
            ->where(['files.ref_files_id' => [3, 4]])
            ->andWhere(['language_file' => Yii::$app->language])

            ->orderBy(new \yii\db\Expression("
        CASE
            WHEN RIGHT(fileName, 3) = 'pdf' THEN 1
            WHEN RIGHT(fileName, 3) IN ('doc','ocx') THEN 2
            ELSE 3
        END 
        "))->asArray()->all();


        return $this->render('applicant-academic-titles', ['professors' => $professor]);
    }
    public function actionContact()
    {
        return $this->render('contact');
    }
    public function actionVacancy()
    {
        return $this->render('vacancy');
    }
    public function actionAcademicMobility()
    {
        return $this->render('academic-mobility');
    }
    public function actionConferencesAndSeminar()
    {
        return $this->render('conferences-and-seminar');
    }
    public function actionIntlOrgMembership()
    {
        return $this->render('intl-org-membership');
    }
    public function actionEvents()
    {
        return $this->render('events');
    }
    public function actionMessages()
    {
        $questions = FeedbackFormMessage::find()
            ->where(['type_message' => 'question'])
            ->with('answers')
            ->orderBy(['date_time' => SORT_DESC])
            ->all();

        return $this->render('messages', [
            'questions' => $questions,
        ]);
    }

}
