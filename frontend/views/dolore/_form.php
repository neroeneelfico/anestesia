<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dolore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dolore-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idprocedure')->textInput() ?>

    <?= $form->field($model, 'orariodolore')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scaladolore')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
