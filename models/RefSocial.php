<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_social".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Social[] $socials
 */
class RefSocial extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_social';
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
     * Gets query for [[Socials]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSocials()
    {
        return $this->hasMany(Social::class, ['ref_social_id' => 'id']);
    }

}
