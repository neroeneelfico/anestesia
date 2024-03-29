<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Compila i seguenti campi per effettuare il login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'codicefiscale')->textInput(['autofocus' => true])->widget(\yii\widgets\MaskedInput::className(),['name'=>'Codice Fiscale','mask' => 'AAAAAA99A99A999A'])->label("Codice Fiscale") ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password']) ?> <?= Html::label('Mostra password', 'reveal-password') ?>


          <!--  <?= $form->field($model, 'rememberMe')->checkbox()->label('Ricordami') ?>
-->

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");
?>
