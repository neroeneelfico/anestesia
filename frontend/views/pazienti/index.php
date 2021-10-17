<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PazientiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pazienti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pazienti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Inserisci Paziente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'idpazienti',
                'label' => 'Id Pazienti',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(
                        $model->idpazienti,
                        ['listaprocedure', 'id' => $model->idpazienti],
                        [
                            'title' => 'View',
                        ]
                    );
                },
            ],
            'nome',
            'cognome',
            'età',
            //'u.o',
            //'ospedale',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
