<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pazienti */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pazienti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'età')->textInput([
        'type' => 'number'
    ]) ?>

    <?= $form->field($model, 'uo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ospedale')->textInput(['readonly' => true, 'value' =>'Agrigento']) ?>

    <div class="form-group">
        <?= Html::submitButton('Inserisci', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
