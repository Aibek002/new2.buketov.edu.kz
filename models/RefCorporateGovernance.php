<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_corporate_governance".
 *
 * @property int $id
 * @property string|null $type
 *
 * @property CorporateGovernanceFile[] $corporateGovernanceFiles
 */
class RefCorporateGovernance extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_corporate_governance';
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
     * Gets query for [[CorporateGovernanceFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCorporateGovernanceFiles()
    {
        return $this->hasMany(CorporateGovernanceFile::class, ['ref_corporate_governance' => 'id']);
    }

}
