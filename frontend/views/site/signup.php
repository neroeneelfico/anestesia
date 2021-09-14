<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Registrazione';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Per favore registrati inserendo i tuoi dati:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'nome')->textInput(); ?>
            <?= $form->field($model, 'cognome')->textInput(); ?>

            <?= $form->field($model, 'codicefiscale')->textInput(['autofocus' => true])->widget(\yii\widgets\MaskedInput::className(),['name'=>'Codice Fiscale','mask' => 'AAAAAA99A99A999A'])->label("Codice Fiscale") ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            Se la tua residenza appartiene ad una di queste città e vuoi usufruire della priorità selezionala da questa casella
            <?=$form->field($model, 'residenza')->dropDownList(['' => 'Nessuna priorità', 'Caltanissetta' => 'Caltanissetta','Agrigento'=>'Agrigento','Trapani'=>'Trapani','Cefalù'=>'Cefalù'],['prompt'=>'Seleziona una città'])->label('');?>
                <div class="form-group">
                    <?= Html::submitButton('Registrati', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
