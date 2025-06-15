<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profession".
 *
 * @property int $id
 * @property string|null $special_code
 * @property string|null $name_kz
 * @property string|null $name_ru
 * @property string|null $name_en
 * @property int|null $semi_passing_points
 * @property int|null $passing_points
 * @property int|null $skill_level_id
 * @property int|null $ref_type_profession_id
 *
 * @property RefTypeProfession $refTypeProfession
 * @property SkillLevel $skillLevel
 * @property SubjectToProfession[] $subjectToProfessions
 */
class Profession extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['special_code', 'name_kz', 'name_ru', 'name_en', 'semi_passing_points', 'passing_points', 'skill_level_id', 'ref_type_profession_id'], 'default', 'value' => null],
            [['special_code', 'name_kz', 'name_ru', 'name_en'], 'string'],
            [['semi_passing_points', 'passing_points', 'skill_level_id', 'ref_type_profession_id'], 'integer'],
            [['ref_type_profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefTypeProfession::class, 'targetAttribute' => ['ref_type_profession_id' => 'id']],
            [['skill_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillLevel::class, 'targetAttribute' => ['skill_level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'special_code' => 'Special Code',
            'name_kz' => 'Name Kz',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'semi_passing_points' => 'Semi Passing Points',
            'passing_points' => 'Passing Points',
            'skill_level_id' => 'Skill Level ID',
            'ref_type_profession_id' => 'Ref Type Profession ID',
        ];
    }

    /**
     * Gets query for [[RefTypeProfession]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefTypeProfession()
    {
        return $this->hasOne(RefTypeProfession::class, ['id' => 'ref_type_profession_id']);
    }

    /**
     * Gets query for [[SkillLevel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkillLevel()
    {
        return $this->hasOne(SkillLevel::class, ['id' => 'skill_level_id']);
    }

    /**
     * Gets query for [[SubjectToProfessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectToProfessions()
    {
        return $this->hasMany(SubjectToProfession::class, ['profession_id' => 'id']);
    }

}
