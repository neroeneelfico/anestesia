<?php

use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dolore */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dolore-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $idprocedura = isset($_GET['idprocedura']) ? $_GET['idprocedura'] : 0;
    ?>
    <?= $form->field($model, 'idprocedure')->textInput([
        'type' => 'number',
        'value' => $idprocedura
    ])->label('Id della procedura') ?>
<hr>
    <?php
    echo '<label><h3>Inserisci la data della valutazione</h3></label>';
echo DateTimePicker::widget([
    'name' => 'orariodolore',
    'model' => $model,
    'attribute' => 'orariodolore',
    'options' => ['placeholder' => 'Data Valutazione'],
    'convertFormat' => true,
    'pluginOptions' => [
        'format' => 'dd-MM-yyyy HH:i:s',
        'todayHighlight' => true
    ]
]);
?>
    <br>
    <br>
<hr>
    <?= $form->field($model, 'scaladolore')->textInput([
        'type' => 'number'
    ])->label('Scala Dolore VAS (1-10)') ?>

    <div class="form-group">
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
