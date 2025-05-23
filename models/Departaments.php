<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departaments".
 *
 * @property int $id
 * @property string $name
 * @property string $information
 * @property int $faculty_id
 *
 * @property Faculty $faculty
 * @property Staff[] $staff
 */
class Departaments extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departaments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'information', 'faculty_id'], 'required'],
            [['name', 'information'], 'string'],
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
            'information' => 'Information',
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

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['departament_id' => 'id']);
    }

}
