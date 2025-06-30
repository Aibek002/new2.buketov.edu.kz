<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_to_profesion".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $profession_id
 *
 * @property Profession $profession
 * @property Subject $subject
 */
class SubjectToProfesion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_to_profesion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'profession_id'], 'default', 'value' => null],
            [['subject_id', 'profession_id'], 'integer'],
            [['profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profession::class, 'targetAttribute' => ['profession_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'profession_id' => 'Profession ID',
        ];
    }

    /**
     * Gets query for [[Profession]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Profession::class, ['id' => 'profession_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

}
