<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corp_sole_shareholder".
 *
 * @property int $id
 * @property int $year
 * @property string $name_pdf
 * @property string $lang
 * @property int|null $author
 * @property string|null $date
 *
 * @property User $author0
 */
class CorpSoleShareholder extends \yii\db\ActiveRecord
{
    public $pdf;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corp_sole_shareholder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author'], 'default', 'value' => null],
            [['year', 'name_pdf', 'lang'], 'required'],
            [['year', 'author'], 'integer'],
            ['pdf', 'safe'],
            [
                ['pdf'],
                'file',
                'extensions' => 'pdf',
                'checkExtensionByMimeType' => true,
                'maxSize' => 20 * 1024 * 1024,
                'tooBig' => 'File must be less than 20MB.',
            ],
            [['name_pdf'], 'string'],
            [['date'], 'safe'],
            [['lang'], 'string', 'max' => 50],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'name_pdf' => 'Name Pdf',
            'lang' => 'Lang',
            'author' => 'Author',
            'date' => 'Date',
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

}
