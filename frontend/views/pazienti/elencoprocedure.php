<?php

use common\models\Convenzioni;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConvenzioniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elenco procedura';
$this->params['breadcrumbs'][] = ['label'=>'Pazienti', 'url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">
    <h3> <?= "Elenco procedura del paziente" ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            'idprocedure',
            'tipointervento',
            'tipoanestesia',
            'analgesiaperiop',
            'analgesiapostop',
            [

                'attribute' => 'nomeAnestesista',

                'label'=>'Anestesista',

            ],
            [

                'attribute' => 'vasDolore',
                'format' => 'raw',
                'value' => function ($model) {
                    $valutazione = explode(',', $model->vasdolore);
                    $testo = "";
                    foreach ($valutazione as $value) {
                        $testo = $testo . $value . "<br>";
                    }
                    return $testo;
                },
                'label' => 'VAS Dolore',
            ],
            [

                'attribute' => 'orarioDolore',
                'format' => 'raw',
                'value' => function ($model) {
                    $valutazione = explode(',', $model->orariodolore);
                    $testo = "";
                    foreach ($valutazione as $value) {
                        $testo = $testo . $value . "<br>";
                    }
                    return $testo;
                },
                'label' => 'Orario valutazione',
            ],
        ],
    ]); ?>

</div>
