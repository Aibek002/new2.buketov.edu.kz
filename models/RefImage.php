<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_image".
 *
 * @property int $id
 * @property string|null $page_name
 *
 * @property Image[] $images
 */
class RefImage extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_name'], 'default', 'value' => null],
            [['page_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_name' => 'Page Name',
        ];
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['ref_image_id' => 'id']);
    }

}
