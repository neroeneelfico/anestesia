<?php

use common\models\Convenzioni;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConvenzioniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenzione gruppo '.$id;
$this->params['breadcrumbs'][] = ['label'=>'Convenzioni', 'url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">
    <h3> <?= "Convenzione gruppo ".$id; ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'nome',
            'cognome',
            [
            'label'=>'Data Inserimento',
                'value'=>'convenzioni_tempo',
                ]
            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
