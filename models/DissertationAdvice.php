<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dissertation_advice".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $faculty_id
 *
 * @property Faculty $faculty
 */
class DissertationAdvice extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dissertation_advice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'faculty_id'], 'default', 'value' => null],
            [['name'], 'string'],
            [['faculty_id'], 'integer'],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::class, 'targetAttribute' => ['faculty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'faculty_id' => 'Faculty ID',
        ];
    }

    /**
     * Gets query for [[Faculty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::class, ['id' => 'faculty_id']);
    }

}
