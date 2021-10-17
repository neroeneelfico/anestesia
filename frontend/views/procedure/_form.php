<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Procedure */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedure-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $idpaziente = isset($_GET['idpazienti']) ? $_GET['idpazienti'] : 0;
    ?>
    <?= $form->field($model, 'idpazienti')->textInput([
        'type' => 'number',
        'value' => $idpaziente
    ])->label("ID del paziente") ?>

    <?= $form->field($model, 'tipoanestesia')->dropDownList(['Generale' => 'Generale', 'Plessica' => 'Plessica','Spinale'=>'Spinale','Epidurale'=>'Epidurale'],['prompt'=>'Seleziona il tipo di Anestesia'])->label("Tipo Anestesia");
    ?>

    <?= $form->field($model, 'analgesiaperiop')->textarea(['rows' => 6])->label('Analgesia perioperatoria') ?>

    <?= $form->field($model, 'analgesiapostop')->textarea(['rows' => 6])->label('Analgesia postoperatoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Salva procedura', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
