<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_sort_order_admission_pdf".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property AdmissionPdf[] $admissionPdfs
 */
class RefSortOrderAdmissionPdf extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_sort_order_admission_pdf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'default', 'value' => null],
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
     * Gets query for [[AdmissionPdfs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmissionPdfs()
    {
        return $this->hasMany(AdmissionPdf::class, ['ref_sort_order_id' => 'id']);
    }

}
