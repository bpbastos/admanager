<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use Yii;
$this->title = 'Redefinir senha';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redefinir-senha">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor preencha os campos para alterar a senha:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'redefinir-senha-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n{error}",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'nova_senha')->passwordInput() ?>

    <?= $form->field($model, 'nova_senha_confirmacao')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Redefinir senha', ['class' => 'btn btn-primary', 'name' => 'redefinir-senha-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>