<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $ref_staff_id
 * @property string|null $short_information
 * @property int|null $departament_id
 *
 * @property Departaments $departament
 * @property RefStaff $refStaff
 */
class Staff extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['short_information', 'departament_id'], 'default', 'value' => null],
            [['name', 'surname', 'patronymic', 'ref_staff_id'], 'required'],
            [['name', 'surname', 'patronymic', 'short_information'], 'string'],
            [['ref_staff_id', 'departament_id'], 'integer'],
            [['departament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departaments::class, 'targetAttribute' => ['departament_id' => 'id']],
            [['ref_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefStaff::class, 'targetAttribute' => ['ref_staff_id' => 'id']],
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
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'ref_staff_id' => 'Ref Staff ID',
            'short_information' => 'Short Information',
            'departament_id' => 'Departament ID',
        ];
    }

    /**
     * Gets query for [[Departament]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartament()
    {
        return $this->hasOne(Departaments::class, ['id' => 'departament_id']);
    }

    /**
     * Gets query for [[RefStaff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefStaff()
    {
        return $this->hasOne(RefStaff::class, ['id' => 'ref_staff_id']);
    }

}
