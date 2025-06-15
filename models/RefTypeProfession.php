<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_type_profession".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Profession[] $professions
 */
class RefTypeProfession extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_type_profession';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'default', 'value' => null],
            [['type'], 'string', 'max' => 255],
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
     * Gets query for [[Professions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfessions()
    {
        return $this->hasMany(Profession::class, ['ref_type_profession_id' => 'id']);
    }

}
