<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string $time
 * @property string|null $time_zone
 */
class Events extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'time_zone'], 'default', 'value' => null],
            [['title', 'description', 'time_zone'], 'string'],
            [['time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'time' => 'Time',
            'time_zone' => 'Time Zone',
        ];
    }

}
