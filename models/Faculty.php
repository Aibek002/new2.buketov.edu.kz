<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property int $id
 * @property string $name
 * @property string|null $information
 * @property string|null $welcome
 *
 * @property Departaments[] $departaments
 */
class Faculty extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['information', 'welcome'], 'default', 'value' => null],
            [['name'], 'required'],
            [['name', 'information', 'welcome'], 'string'],
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
            'information' => 'Information',
            'welcome' => 'Welcome text',
        ];
    }

    /**
     * Gets query for [[Departaments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartaments()
    {
        return $this->hasMany(Departaments::class, ['faculty_id' => 'id']);
    }

}
