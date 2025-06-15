<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history_departament".
 *
 * @property int $id
 * @property string|null $title_kz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $content_kz
 * @property string|null $content_ru
 * @property string|null $content_en
 * @property int|null $departament_id
 *
 * @property Departament $departament
 */
class HistoryDepartament extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_departament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en', 'departament_id'], 'default', 'value' => null],
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'string'],
            [['departament_id'], 'integer'],
            [['departament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departament::class, 'targetAttribute' => ['departament_id' => 'id']],
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
            'departament_id' => 'Departament ID',
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

}
