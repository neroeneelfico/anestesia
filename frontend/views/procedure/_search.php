<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SearchProcedure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedure-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idprocedure') ?>

    <?= $form->field($model, 'idpazienti') ?>

    <?= $form->field($model, 'idanestesista') ?>

    <?= $form->field($model, 'tipoanestesia') ?>

    <?= $form->field($model, 'analgesiaperiop') ?>

    <?php // echo $form->field($model, 'analgesiapostop') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
