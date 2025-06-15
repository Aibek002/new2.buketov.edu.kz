<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_level".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property Profession[] $professions
 */
class SkillLevel extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skill_level';
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
        return $this->hasMany(Profession::class, ['skill_level_id' => 'id']);
    }

}
