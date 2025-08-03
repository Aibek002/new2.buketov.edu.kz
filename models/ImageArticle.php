<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image_article".
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $author
 * @property int|null $ref_article_id
 *
 * @property User $author0
 * @property RefArticle $refArticle
 */
class ImageArticle extends \yii\db\ActiveRecord
{

    public $images;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'author', 'ref_article_id'], 'default', 'value' => null],
            [['author', 'ref_article_id'], 'integer'],
            [['ref_article_id'], 'required'],
            [['images'], 'file', 'extensions' => 'jpg, png, jpeg', 'maxFiles' => 10],
            [['ref_article_id'], 'required'],
            [['image'], 'safe'], // чтобы не мешало сохранению имени
            [['author'], 'integer'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author' => 'id']],
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
            'image' => 'Image',
            'author' => 'Author',
            'ref_article_id' => 'Ref Article ID',
        ];
    }

    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(User::class, ['id' => 'author']);
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
