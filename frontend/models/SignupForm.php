<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nome;
    public $cognome;
    public $residenza;
    public $codicefiscale;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['codicefiscale', 'trim'],
            ['codicefiscale', 'required'],
            ['codicefiscale', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Questo codice ficale è già in uso.'],
            ['nome', 'required'],
            ['cognome','required'],
            ['residenza','safe'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->nome = $this->nome;
        $user->cognome = $this->cognome;
        $user->codicefiscale = $this->codicefiscale;
        $user->residenza = $this->residenza;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Registrazione account su ' . Yii::$app->name)
            ->send();
    }
}
