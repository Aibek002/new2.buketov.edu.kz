<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smi_about_us".
 *
 * @property int $id
 * @property string|null $title_kz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $content_kz
 * @property string|null $content_ru
 * @property string|null $content_en
 */
class SmiAboutUs extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smi_about_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'default', 'value' => null],
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'string'],
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
        ];
    }

}
