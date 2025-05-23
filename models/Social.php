<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property int $ref_social_id
 * @property int|null $link_id
 * @property int $type_social_id
 * @property string|null $info
 *
 * @property RefSocial $refSocial
 * @property TypeSocial $typeSocial
 */
class Social extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link_id', 'info'], 'default', 'value' => null],
            [['ref_social_id', 'type_social_id'], 'required'],
            [['ref_social_id', 'link_id', 'type_social_id'], 'integer'],
            [['info'], 'string'],
            [['ref_social_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefSocial::class, 'targetAttribute' => ['ref_social_id' => 'id']],
            [['type_social_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeSocial::class, 'targetAttribute' => ['type_social_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_social_id' => 'Ref Social ID',
            'link_id' => 'Link ID',
            'type_social_id' => 'Type Social ID',
            'info' => 'Info',
        ];
    }

    /**
     * Gets query for [[RefSocial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefSocial()
    {
        return $this->hasOne(RefSocial::class, ['id' => 'ref_social_id']);
    }

    /**
     * Gets query for [[TypeSocial]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeSocial()
    {
        return $this->hasOne(TypeSocial::class, ['id' => 'type_social_id']);
    }

}
