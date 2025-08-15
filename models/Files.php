<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $path_file
 * @property int|null $staff_id
 * @property int|null $status
 * @property string|null $fileName
 * @property string|null $language_file
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $author
 *
 * @property User $author0
 * @property Staff $staff
 */
class Files extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path_file', 'staff_id', 'fileName', 'language_file', 'updated_at', 'author'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['path_file', 'fileName', 'language_file'], 'string'],
            [['staff_id', 'status', 'author'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author' => 'id']],
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
            'path_file' => 'Path File',
            'staff_id' => 'Staff ID',
            'status' => 'Status',
            'fileName' => 'File Name',
            'language_file' => 'Language File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
        return $this->hasOne(User::class, ['id' => 'author']);
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
