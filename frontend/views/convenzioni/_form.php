<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Convenzioni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenzioni-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titolo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantitamax')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
