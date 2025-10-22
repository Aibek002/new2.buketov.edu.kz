<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int|null $ref_article_id
 * @property string|null $title_kz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $content_kz
 * @property string|null $content_ru
 * @property string|null $content_en
 *
 * @property RefArticle $refArticle
 */
class Article extends \yii\db\ActiveRecord
{

    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'safe'],
            [['ref_article_id', 'title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'default', 'value' => null],
            [['ref_article_id'], 'integer'],
            [['title_kz', 'title_ru', 'title_en', 'content_kz', 'content_ru', 'content_en'], 'string'],
            [['ref_article_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefArticle::class, 'targetAttribute' => ['ref_article_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_article_id' => 'Ref Article ID',
            'title_kz' => 'Title Kz',
            'title_ru' => 'Title Ru',
            'title_en' => 'Title En',
            'content_kz' => 'Content Kz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
        ];
    }

    /**
     * Gets query for [[RefArticle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefArticle()
    {
        return $this->hasOne(RefArticle::class, ['id' => 'ref_article_id']);
    }

}
