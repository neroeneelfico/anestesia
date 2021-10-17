<?php

use common\models\Convenzioni;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Profilo utente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">

    <h1>Benvenuto <?= $model->nome. " ".$model->cognome; ?></h1>

    <br>
    <br>
    <h3>Hai effettuato </h3><br>
    <?= Html::a($agenerale.' Anestesie generali', ['pazienti/procedurepersonali','idanestesista'=>Yii::$app->user->id,'tipoanestesia'=>'Generale']) ?><br>
    <?= Html::a($aplessica.' Anestesie plessiche', ['pazienti/procedurepersonali','idanestesista'=>Yii::$app->user->id,'tipoanestesia'=>'Plessica']) ?><br>
    <?= Html::a($aspinale.' Anestesie spinali', ['pazienti/procedurepersonali','idanestesista'=>Yii::$app->user->id,'tipoanestesia'=>'Spinale']) ?><br>
    <?= Html::a($aepidurale.' Anestesie epidurali', ['pazienti/procedurepersonali','idanestesista'=>Yii::$app->user->id,'tipoanestesia'=>'Epidurale']) ?><br>

    <?php
    /*
    if($model->residenza != ""){
        echo "La residenza da te scelta è stata approvata: <b>".$model->residenza."</b>";
    }
    else {
        echo "Non hai selezionato nessuna priorità di residenza";
    }
*/
    ?>
    <br><br>
    <?php
    /*
    if($model->convenzioni_id != ""){
        $datainserita = new DateTime($model->convenzioni_tempo);
        $dataattuale = date('Y-m-d H:i:s');
        $dataattuale = new DateTime($dataattuale);
        $since_start = $dataattuale->diff($datainserita);
        $minutes = 0;
        $minutes = $since_start->days * 24 * 60;
        $minutes += $since_start->h * 60;
        $minutes += $since_start->i;
        $convenzione = Convenzioni::find()->where(['id'=>$model->convenzioni_id])->one();
        echo "La convenzione da te selezionata è: <b>".$convenzione->titolo."</b>: ".$convenzione->citta."<br><br>";
        if($minutes < 360)
        echo "Potrai cambiare la tua scelta tra ".(360 -$minutes)." minuti";
        else
            echo "Se vuoi, puoi già effettuare un cambio della convenzione accedendo al menu Convenzioni";
    }
    else {
        echo "Non hai ancora selezionato nessuna convenzione. Accedi nella sezione <b>Convenzioni</b> per procedere";
    }
    */
    ?>

</div>
