<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProcedure */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procedures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedure-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Procedure', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idpazienti',
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
