<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history_faculty".
 *
 * @property int $id
 * @property string|null $title_kz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $content_kz
 * @property string|null $content_ru
 * @property string|null $content_en
 * @property int|null $faculty_id
 *
 * @property Faculty $faculty
 */
class HistoryFaculty extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en', 'faculty_id'], 'default', 'value' => null],
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'string'],
            [['faculty_id'], 'integer'],
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
            'title_kz' => 'Title Kz',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'content_kz' => 'Content Kz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
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

}
