<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback_form_message".
 *
 * @property int $id
 * @property int $status
 * @property string|null $title
 * @property string|null $message
 * @property string|null $email
 * @property int|null $question_id
 * @property string $date_time
 * @property string|null $type_message
 */
class FeedbackFormMessage extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_form_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'message', 'email', 'question_id', 'type_message'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 0],
            [['status', 'question_id'], 'integer'],
            [['title', 'message', 'email', 'type_message'], 'string'],
            [['date_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'title' => 'Title',
            'message' => 'Message',
            'email' => 'Email',
            'question_id' => 'Question ID',
            'date_time' => 'Date Time',
            'type_message' => 'Type Message',
        ];
    }
    public function getAnswers()
    {
        return $this->hasMany(self::class, ['question_id' => 'id'])
            ->andWhere(['type_message' => 'answer']);
    }

    public function getQuestion()
    {
        return $this->hasOne(self::class, ['id' => 'question_id'])
            ->andWhere(['type_message' => 'question']);
    }

}
