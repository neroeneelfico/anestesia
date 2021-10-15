<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchDolore */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dolores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dolore-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dolore', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddolore',
            'idprocedure',
            'idanestesista',
            'orariodolore',
            'scaladolore',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
