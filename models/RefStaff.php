<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_staff".
 *
 * @property int $id
 * @property string $type
 *
 * @property Staff[] $staff
 */
class RefStaff extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
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
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['ref_staff_id' => 'id']);
    }

}
