<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property int $id
 * @property string $path
 * @property int|null $ref_photos_id
 * @property int|null $link_id
 *
 * @property RefPhotos $refPhotos
 */
class Photos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_photos_id', 'link_id'], 'default', 'value' => null],
            [['path'], 'required'],
            [['path'], 'string'],
            [['ref_photos_id', 'link_id'], 'integer'],
            [['ref_photos_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefPhotos::class, 'targetAttribute' => ['ref_photos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'ref_photos_id' => 'Ref Photos ID',
            'link_id' => 'Link ID',
        ];
    }

    /**
     * Gets query for [[RefPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefPhotos()
    {
        return $this->hasOne(RefPhotos::class, ['id' => 'ref_photos_id']);
    }

}
