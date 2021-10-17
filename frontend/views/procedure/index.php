<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProcedure */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procedure';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Inserisci procedura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [

                'attribute' => 'nomePaziente',

                'label'=>'Paziente',

            ],
            'tipoanestesia',
            //'analgesiaperiop:ntext',
            //'analgesiapostop:ntext',
            [

                'attribute' => 'nomeAnestesista',

                'label'=>'Anestesista',

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
