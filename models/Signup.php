<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class Signup extends Model
{

    public $username;
    public $surname;
    public $name;
    public $middle_name;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','surname', 'name', 'middle_name'], 'trim'],
            [['username','surname', 'name', 'middle_name'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['surname', 'name', 'middle_name'], 'string', 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
    */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('all', 'Username'),
            'surname' => Yii::t('all', 'Surname'),
            'name' => Yii::t('all', 'Name'),
            'middle_name' => Yii::t('all', 'Middle Name'),
            'password' => Yii::t('all', 'Password'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->surname = $this->surname;
        $user->name = $this->name;
        $user->middle_name = $this->middle_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}