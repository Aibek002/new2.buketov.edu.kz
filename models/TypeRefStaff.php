<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_ref_staff".
 *
 * @property int $id
 * @property string|null $job_title_kz
 * @property string|null $job_title_ru
 * @property string|null $job_title_en
 * @property string|null $date
 * @property int|null $staff_id
 * @property int|null $ref_staff_id
 *
 * @property RefStaff $refStaff
 * @property Staff $staff
 */
class TypeRefStaff extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_ref_staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_title_kz', 'job_title_ru', 'job_title_en', 'date', 'staff_id', 'ref_staff_id'], 'default', 'value' => null],
            [['job_title_kz', 'job_title_ru', 'job_title_en', 'date'], 'string'],
            [['staff_id', 'ref_staff_id'], 'integer'],
            [['ref_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefStaff::class, 'targetAttribute' => ['ref_staff_id' => 'id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['staff_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_title_kz' => 'Job Title Kz',
            'job_title_ru' => 'Job Title Ru',
            'job_title_en' => 'Job Title En',
            'date' => 'Date',
            'staff_id' => 'Staff ID',
            'ref_staff_id' => 'Ref Staff ID',
        ];
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

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::class, ['id' => 'staff_id']);
    }

}
