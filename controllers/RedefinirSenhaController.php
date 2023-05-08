<?php

namespace app\controllers;

use app\models\RedefinicaoSenhaForm;
use Yii;
use yii\web\Controller;

class RedefinirSenhaController extends Controller
{
    public function actionIndex()
    {
        $model = new RedefinicaoSenhaForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($usuarioAD = Yii::$app->ldap->users()->find($model->username)) {
                if ($usuarioAD->setPassword($model->nova_senha)) {
                    if ($usuarioAD->save()) {
                        Yii::$app->session->setFlash('sucess', 'SENHA ALTERADA COM SUCESSO!');
                    } else {
                        Yii::$app->session->setFlash('error', 'ERRO AO REDEFINIR SENHA');
                    }
                }
            }
        }
        $model->nova_senha = $model->nova_senha_confirmacao = '';
        return $this->render('redefinicaosenha', [
            'model' => $model,
        ]);
    }
}
