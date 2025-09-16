<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctorant".
 *
 * @property int $id
 * @property string|null $full_name_ru
 * @property string|null $full_name_kz
 * @property string|null $full_name_en
 * @property int|null $dissertation_id
 * @property int|null $author
 *
 * @property Staff $author0
 * @property DissertationAdvice $dissertation
 */
class Doctorant extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctorant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name_ru', 'full_name_kz', 'full_name_en', 'dissertation_id', 'author'], 'default', 'value' => null],
            [['full_name_ru', 'full_name_kz', 'full_name_en'], 'string'],
            [['dissertation_id', 'author'], 'integer'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['author' => 'id']],
            [['dissertation_id'], 'exist', 'skipOnError' => true, 'targetClass' => DissertationAdvice::class, 'targetAttribute' => ['dissertation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name_ru' => 'Full Name Ru',
            'full_name_kz' => 'Full Name Kz',
            'full_name_en' => 'Full Name En',
            'dissertation_id' => 'Dissertation ID',
            'author' => 'Author',
        ];
    }

    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(Staff::class, ['id' => 'author']);
    }

    /**
     * Gets query for [[Dissertation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDissertation()
    {
        return $this->hasOne(DissertationAdvice::class, ['id' => 'dissertation_id']);
    }

}
