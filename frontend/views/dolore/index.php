<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchDolore */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dolore';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dolore-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Inserisci il dolore del paziente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'idprocedure',
                'label' => 'Id Procedura',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(
                        $model->idprocedure,
                        ['procedure/view', 'idprocedure' => $model->idprocedure, 'idanestesista'=>$model->idanestesista,'idpazienti'=>$model->idpazienti],
                        [
                            'title' => 'View',
                        ]
                    );
                },
            ],
            'orariodolore',
            'scaladolore',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
