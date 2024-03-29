<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenzionis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Convenzioni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titolo',
            'citta',
            'quantitamax',
            'idutente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
