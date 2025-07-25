<?php

namespace app\models;

use yii\base\Model;

class FeedbackForm extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $message;

    public function rules()
    {
        return [
            [['fio', 'email', 'phone', 'message'], 'required'],
            ['email', 'email'],
            ['fio', 'string', 'max' => 100],
            ['message', 'string', 'max' => 500],
        ];
    }
}
