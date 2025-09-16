<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applicant_for_academic_titles".
 *
 * @property int $id
 * @property string|null $full_name_kz
 * @property string|null $full_name_ru
 * @property string|null $full_name_en
 * @property int|null $author
 *
 * @property Files[] $files
 */
class ApplicantForAcademicTitles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicant_for_academic_titles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name_kz', 'full_name_ru', 'full_name_en', 'author'], 'default', 'value' => null],
            [['full_name_kz', 'full_name_ru', 'full_name_en'], 'string'],
            [['author'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name_kz' => 'Full Name Kz',
            'full_name_ru' => 'Full Name Ru',
            'full_name_en' => 'Full Name En',
            'author' => 'Author',
        ];
    }

    /**
     * Gets query for [[Files]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::class, ['professor_id' => 'id']);
    }

}
