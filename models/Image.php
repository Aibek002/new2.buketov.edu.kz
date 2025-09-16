<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property int|null $ref_image_id
 * @property int|null $column_id
 * @property string|null $image
 * @property int|null $sort_order
 *
 * @property RefImage $refImage
 */
class Image extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_image_id', 'column_id',  'sort_order'], 'default', 'value' => null],
            [['ref_image_id', 'column_id', 'sort_order'], 'integer'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10],
            [['ref_image_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefImage::class, 'targetAttribute' => ['ref_image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_image_id' => 'Ref Image ID',
            'column_id' => 'Column ID',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * Gets query for [[RefImage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefImage()
    {
        return $this->hasOne(RefImage::class, ['id' => 'ref_image_id']);
    }

}
