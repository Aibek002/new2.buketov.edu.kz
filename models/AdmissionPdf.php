<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admission_pdf".
 *
 * @property int $id
 * @property int|null $ref_sort_order_id
 * @property int|null $skill_level_id
 * @property string|null $path
 * @property int|null $archive
 *
 * @property RefSortOrderAdmissionPdf $refSortOrder
 * @property SkillLevelId $skillLevelId
 */
class AdmissionPdf extends \yii\db\ActiveRecord
{

    public $replace_file_id;
    public $file;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admission_pdf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ref_sort_order_id', 'skill_level_id', 'path', 'archive'], 'default', 'value' => null],
            [['ref_sort_order_id', 'skill_level_id', 'archive'], 'integer'],
            [['replace_file_id'], 'integer'],
             [['file'], 'file', 'extensions' => 'pdf', 'mimeTypes' => 'application/pdf'],
            [['path', 'name_url', 'lang_pdf'], 'string', 'max' => 255],
            [['path'], 'string'],
            [['ref_sort_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => RefSortOrderAdmissionPdf::class, 'targetAttribute' => ['ref_sort_order_id' => 'id']],
            [['skill_level_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillLevel::class, 'targetAttribute' => ['skill_level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_sort_order_id' => 'Ref Sort Order ID',
            'skill_level_id' => 'Skill Level ID',
            'path' => 'Path',
            'archive' => 'Archive',
        ];
    }

    /**
     * Gets query for [[RefSortOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRefSortOrder()
    {
        return $this->hasOne(RefSortOrderAdmissionPdf::class, ['id' => 'ref_sort_order_id']);
    }

    /**
     * Gets query for [[SkillLevel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkillLevelId()
    {
        return $this->hasOne(SkillLevel::class, ['id' => 'skill_level_id']);
    }

}
