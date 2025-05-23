<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_photos".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Photos[] $photos
 */
class RefPhotos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_photos';
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
     * Gets query for [[Photos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photos::class, ['ref_photos_id' => 'id']);
    }

}
