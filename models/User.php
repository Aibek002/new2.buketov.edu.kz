<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string|null $auth_key
 * @property string|null $email
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $submitPassword;
    public $role;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'submitPassword'], 'required'],
            [['email'], 'email'],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'auth_key', 'email', 'password_hash'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'min' => 6],
            ['role', 'safe'],
            ['submitPassword', 'compare', 'compareAttribute' => 'password_hash', 'message' => 'Пароли не совпадают'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password_hash' => 'Пароль',
            'submitPassword' => 'Повторите пароль',
            'email' => 'Email',
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // если не используешь API-токены
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}
