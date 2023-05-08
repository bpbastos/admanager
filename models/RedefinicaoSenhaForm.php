<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RedefinicaoSenhaForm extends Model
{
    public $username;
    public $nova_senha;
    public $nova_senha_confirmacao;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','nova_senha', 'nova_senha_confirmacao'], 'required'],
            [['nova_senha','nova_senha_confirmacao'], 'string', 'length' =>[8, 20]],
            [['nova_senha_confirmacao'], 'compare', 'compareAttribute' => 'nova_senha', 'message' => 'Senhas não conferem.'],
            ['username', 'validaUsuario'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'nova_senha' => 'Nova senha',
            'nova_senha_confirmacao' => 'Confirme a nova senha',
        ];
    }

    public function validaUsuario($attribute, $params, $validator)
    {
        if (!$this->hasErrors()) {
            if(Yii::$app->ldap->users()->find($this->$attribute)===false) {
                $this->addError($attribute, 'Usuário inválido.');
            }
        }
    }

}
