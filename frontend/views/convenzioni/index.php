<?php

use common\models\Convenzioni;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConvenzioniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenzioni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">

<!--
    <p>
        <?= Html::a('Create Convenzioni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'titolo',
            'citta',
            'quantitamax',
            [
                    'label' => 'Selezionati',
                    'value' => function ($model){
                        return $model->getQuanti();
                    }
            ],
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <br>
    <br>
    <b>Scegli il tuo gruppo</b>
    <br>
    Inserendo la scelta si potrà vedere quante persone l'hanno selezionata (e quindi capire se è in esubero o meno) e si potrà cambiare più volte la propria risposta nell'arco di tempo stabilito (2 giorni, scelta ogni 6h).<br><br>

    Alla fine del tempo SE non si sarà riusciti a distribuire nelle varie rotazioni da soli rispettando i numeri richiesti  AVVERRÀ IL SORTEGGIO per le rotazioni IN CUI CI SONO PERSONE IN ECCESSO, queste persone dovranno andare a saturare le rotazioni rimaste senza unità qualunque esse siano (a questo punto dove si finisce si finisce, NON VERRANNO RIMESSI TUTTI IN GIOCO ma solo quelli nelle rotazioni in esubero)
    <br><br>
    <?php
    $dataattuale = date('Y-m-d H:i:s');
    $dataattuale = new DateTime($dataattuale);
    $datainserita = new DateTime("2021-09-24 23:59:59");
    $since_start = $datainserita->diff($dataattuale);
    $minutes = 0;
    $hours = 0;
    $days = 0;
    $seconds = 0;
    $days = $since_start->days;
    $hours = $since_start->h;
    $minutes = $since_start->i;
    $seconds = $since_start->s;
    echo "<h3>Tempo rimanente alla fine della scelta: ".$days." giorni, ".$hours." ore, ".$minutes." minuti, ".$seconds." secondi</h3>";
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'convenzioni_id')
        ->dropDownList(
            ArrayHelper::map(Convenzioni::find()->asArray()->all(), 'id', 'titolo')
        )->label("");
    ?>
    <?=
    $form->field($model, 'convenzioni_tempo')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Seleziona convenzione', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?= $form->errorSummary($model); ?>

</div>
