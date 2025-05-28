<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
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
 *
 * @property Departament[] $departaments
 * @property Staff[] $staff
 */
class Faculty extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_kz', 'name_ru', 'name_en', 'information_kz', 'information_ru', 'information_en', 'welcome_kz', 'welcome_ru', 'welcome_en'], 'default', 'value' => null],
            [['information_kz', 'information_ru', 'information_en', 'welcome_kz', 'welcome_ru', 'welcome_en'], 'string'],
            [['name_kz', 'name_ru', 'name_en'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Departaments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartaments()
    {
        return $this->hasMany(Departament::class, ['faculty_id' => 'id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['faculty_id' => 'id']);
    }

}
