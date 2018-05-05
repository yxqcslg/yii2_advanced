<?php
namespace backend\models;

use yii\base\Model;
use common\models\Adminuser;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nickname;
    public $email;
    public $password;
    public $password_repeat;
    public $profile;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			['password_repeat', 'compare', 'compareAttribute'=>'password', 'message' => 'New and confirmed passwords are not the same.'],
        	['nickname', 'required'],
			['nickname', 'string', 'max' => 128],
			['profile', 'string'],

		];
    }
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'username' => 'Username',
			'nickname' => 'Nickname',
			'password' => 'Password',
			'password_repeat' => 'Repeat Password',
			'email' => 'Email',
			'profile' => 'Profile',
		];
	}
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

		$adminuser = new Adminuser();
		$adminuser->username = $this->username;
		$adminuser->nickname = $this->nickname;
		$adminuser->email = $this->email;
		$adminuser->profile = $this->profile;
		$adminuser->setPassword($this->password);
		$adminuser->generateAuthKey();
		$adminuser->password = '*';

		return $adminuser->save() ? $adminuser : null;
    }
}
