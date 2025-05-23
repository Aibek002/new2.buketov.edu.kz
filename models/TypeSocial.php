<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_social".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Social[] $socials
 */
class TypeSocial extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_social';
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
        return $this->hasMany(Social::class, ['type_social_id' => 'id']);
    }

}
