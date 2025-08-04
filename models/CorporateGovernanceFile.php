<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corporate_governance_file".
 *
 * @property int $id
 * @property string $name_url
 * @property string $path_file
 * @property string $sort_id
 * @property int|null $ref_corporate_governance
 * @property int|null $author
 * @property int|null $status
 * @property string $date_create
 *
 * @property User $author0
 * @property RefCorporateGovernance $refCorporateGovernance
 */
class CorporateGovernanceFile extends \yii\db\ActiveRecord
{

    public $subsection_corporate_governance;
    public $board_subsec;
    public $committee_subsec;
    public $committee_subsection;

    public $year;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corporate_governance_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_corporate_governance', 'author'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['name_url', 'path_file', 'sort_id'], 'required'],
            [['path_file', 'sort_id'], 'string'],
            [['ref_corporate_governance', 'author', 'status'], 'integer'],
            [['date_create'], 'safe'],
            [['name_url'], 'string', 'max' => 255],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author' => 'id']],
            [['ref_corporate_governance'], 'exist', 'skipOnError' => true, 'targetClass' => RefCorporateGovernance::class, 'targetAttribute' => ['ref_corporate_governance' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_url' => 'Name Url',
            'path_file' => 'Path File',
            'sort_id' => 'Sort ID',
            'ref_corporate_governance' => 'Ref Corporate Governance',
            'author' => 'Author',
            'status' => 'Status',
            'date_create' => 'Date Create',
        ];
    }

    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(User::class, ['id' => 'author']);
    }

    /**
     * Gets query for [[RefCorporateGovernance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefCorporateGovernance()
    {
        return $this->hasOne(RefCorporateGovernance::class, ['id' => 'ref_corporate_governance']);
    }

}
