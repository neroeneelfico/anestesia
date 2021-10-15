<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Procedure */

$this->title = $model->idprocedure;
$this->params['breadcrumbs'][] = ['label' => 'Procedures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="procedure-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idprocedure' => $model->idprocedure, 'idpazienti' => $model->idpazienti, 'idanestesista' => $model->idanestesista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idprocedure' => $model->idprocedure, 'idpazienti' => $model->idpazienti, 'idanestesista' => $model->idanestesista], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprocedure',
            'idpazienti',
            'idanestesista',
            'tipoanestesia',
            'analgesiaperiop:ntext',
            'analgesiapostop:ntext',
        ],
    ]) ?>

</div>
