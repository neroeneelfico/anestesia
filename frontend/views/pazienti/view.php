<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pazienti */

$this->title = $model->idpazienti;
$this->params['breadcrumbs'][] = ['label' => 'Pazienti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pazienti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idpazienti' => $model->idpazienti], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idpazienti' => $model->idpazienti], [
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
            'nome',
            'cognome',
            'età',
            'uo',
            'ospedale',
        ],
    ]) ?>
    <?= Html::a('Inserisci Procedura', ['procedure/create', 'idpazienti' => $model->idpazienti], ['class' => 'btn btn-primary']) ?>


</div>
