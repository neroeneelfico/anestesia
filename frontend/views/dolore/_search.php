<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchDolore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dolore-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddolore') ?>

    <?= $form->field($model, 'idprocedure') ?>

    <?= $form->field($model, 'idanestesista') ?>

    <?= $form->field($model, 'orariodolore') ?>

    <?= $form->field($model, 'scaladolore') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
