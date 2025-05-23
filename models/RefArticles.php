<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_articles".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Articles[] $articles
 */
class RefArticles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'default', 'value' => null],
            [['type'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::class, ['ref_articles_id' => 'id']);
    }

}
