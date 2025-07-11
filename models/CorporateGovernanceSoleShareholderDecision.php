<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corporate_governance_sole_shareholder_decision".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $year
 * @property string|null $file_name
 */
class CorporateGovernanceSoleShareholderDecision extends \yii\db\ActiveRecord
{
    public $pdf;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corporate_governance_sole_shareholder_decision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'year', 'file_name'], 'default', 'value' => null],
            [['year'], 'integer'],
            [['pdf'], 'safe'],
            [['lang'], 'safe'],
            [['date', 'file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'year' => 'Year',
            'file_name' => 'File Name',
        ];
    }

}
