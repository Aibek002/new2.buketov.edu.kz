<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property int $ref_staff_id
 * @property string|null $surname_kz
 * @property string|null $surname_ru
 * @property string|null $surname_en
 * @property string|null $name_kz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $patronymic_kz
 * @property string|null $patronymic_ru
 * @property string|null $patronymic_en
 * @property string|null $information_kz
 * @property string|null $information_ru
 * @property string|null $information_en
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $faculty_id
 * @property int|null $departament_id
 * @property string|null $welcome_kz
 * @property string|null $welcome_ru
 * @property string|null $welcome_en
 * @property string|null $job_title_kz
 * @property string|null $job_title_ru
 * @property string|null $job_title_en
 *
 * @property Departament $departament
 * @property Faculty $faculty
 * @property RefStaff $refStaff
 */
class Staff extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['faculty_show', 'dissertation_show'], 'boolean'],
            [['surname_kz', 'surname_ru', 'surname_en', 'name_kz', 'name_ru', 'name_en', 'patronymic_kz', 'patronymic_ru', 'patronymic_en', 'information_kz', 'information_ru', 'information_en', 'email', 'phone', 'faculty_id', 'departament_id', 'welcome_kz', 'welcome_ru', 'welcome_en', 'job_title_kz', 'job_title_ru', 'job_title_en'], 'default', 'value' => null],
            [['ref_staff_id'], 'required'],
            [['ref_staff_id', 'faculty_id', 'departament_id'], 'integer'],
            [['information_kz', 'information_ru', 'information_en', 'email', 'phone', 'welcome_kz', 'welcome_ru', 'welcome_en', 'job_title_kz', 'job_title_ru', 'job_title_en'], 'string'],
            [['surname_kz', 'surname_ru', 'surname_en', 'name_kz', 'name_ru', 'name_en', 'patronymic_kz', 'patronymic_ru', 'patronymic_en'], 'string', 'max' => 255],
            [['departament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departament::class, 'targetAttribute' => ['departament_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::class, 'targetAttribute' => ['faculty_id' => 'id']],
            [['ref_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefStaff::class, 'targetAttribute' => ['ref_staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_staff_id' => 'Ref Staff ID',
            'surname_kz' => 'Surname Kz',
            'surname_ru' => 'Surname Ru',
            'surname_en' => 'Surname En',
            'name_kz' => 'Name Kz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'patronymic_kz' => 'Patronymic Kz',
            'patronymic_ru' => 'Patronymic Ru',
            'patronymic_en' => 'Patronymic En',
            'information_kz' => 'Information Kz',
            'information_ru' => 'Information Ru',
            'information_en' => 'Information En',
            'email' => 'Email',
            'phone' => 'Phone',
            'faculty_id' => 'Faculty ID',
            'departament_id' => 'Departament ID',
            'welcome_kz' => 'Welcome Kz',
            'welcome_ru' => 'Welcome Ru',
            'welcome_en' => 'Welcome En',
            'job_title_kz' => 'Job Title Kz',
            'job_title_ru' => 'Job Title Ru',
            'job_title_en' => 'Job Title En',
        ];
    }

    /**
     * Gets query for [[Departament]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartament()
    {
        return $this->hasOne(Departament::class, ['id' => 'departament_id']);
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::class, ['id' => 'faculty_id']);
    }

    /**
     * Gets query for [[RefStaff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefStaff()
    {
        return $this->hasOne(RefStaff::class, ['id' => 'ref_staff_id']);
    }

}
