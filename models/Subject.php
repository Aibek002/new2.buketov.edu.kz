<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string|null $name_kz
 * @property string|null $name_ru
 * @property string|null $name_en
 *
 * @property SubjectToProfession[] $subjectToProfessions
 */
class Subject extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_kz', 'name_ru', 'name_en'], 'default', 'value' => null],
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
        ];
    }

    /**
     * Gets query for [[SubjectToProfessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectToProfessions()
    {
        return $this->hasMany(SubjectToProfession::class, ['subject_id' => 'id']);
    }

}
