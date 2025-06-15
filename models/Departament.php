<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departament".
 *
 * @property int $id
 * @property string|null $name_kz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property string|null $information_kz
 * @property string|null $information_ru
 * @property string|null $information_en
 * @property string|null $welcome_kz
 * @property string|null $welcome_ru
 * @property string|null $welcome_en
 * @property int|null $faculty_id
 *
 * @property Faculty $faculty
 * @property HistoryDepartament[] $historyDepartaments
 * @property Staff[] $staff
 */
class Departament extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_kz', 'name_ru', 'name_en', 'information_kz', 'information_ru', 'information_en', 'welcome_kz', 'welcome_ru', 'welcome_en', 'faculty_id'], 'default', 'value' => null],
            [['information_kz', 'information_ru', 'information_en', 'welcome_kz', 'welcome_ru', 'welcome_en'], 'string'],
            [['faculty_id'], 'integer'],
            [['name_kz', 'name_ru', 'name_en'], 'string', 'max' => 255],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::class, 'targetAttribute' => ['faculty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_kz' => 'Name Kz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'information_kz' => 'Information Kz',
            'information_ru' => 'Information Ru',
            'information_en' => 'Information En',
            'welcome_kz' => 'Welcome Kz',
            'welcome_ru' => 'Welcome Ru',
            'welcome_en' => 'Welcome En',
            'faculty_id' => 'Faculty ID',
        ];
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
     * Gets query for [[HistoryDepartaments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryDepartaments()
    {
        return $this->hasMany(HistoryDepartament::class, ['departament_id' => 'id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['departament_id' => 'id']);
    }

}
