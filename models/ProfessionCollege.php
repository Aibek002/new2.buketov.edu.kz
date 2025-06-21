<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profession_college".
 *
 * @property int $id
 * @property string|null $name_kz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $profession_id
 * @property string|null $special_code
 *
 * @property Profession $profession
 */
class ProfessionCollege extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession_college';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_kz', 'name_ru', 'name_en', 'profession_id', 'special_code'], 'default', 'value' => null],
            [['name_kz', 'name_ru', 'name_en', 'special_code'], 'string'],
            [['profession_id'], 'integer'],
            [['profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profession::class, 'targetAttribute' => ['profession_id' => 'id']],
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
            'profession_id' => 'Profession ID',
            'special_code' => 'Special Code',
        ];
    }

    /**
     * Gets query for [[Profession]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Profession::class, ['id' => 'profession_id']);
    }

}
