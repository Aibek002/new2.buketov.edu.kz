<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int $ref_articles_id
 * @property string|null $title
 * @property string|null $description
 *
 * @property RefArticles $refArticles
 */
class Articles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'default', 'value' => null],
            [['ref_articles_id'], 'required'],
            [['ref_articles_id'], 'integer'],
            [['title', 'description'], 'string'],
            [['ref_articles_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefArticles::class, 'targetAttribute' => ['ref_articles_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_articles_id' => 'Ref Articles ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[RefArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefArticles()
    {
        return $this->hasOne(RefArticles::class, ['id' => 'ref_articles_id']);
    }

}
