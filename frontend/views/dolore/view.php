<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dolore */

$this->title = $model->iddolore;
$this->params['breadcrumbs'][] = ['label' => 'Dolores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dolore-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddolore' => $model->iddolore, 'idprocedure' => $model->idprocedure, 'idanestesista' => $model->idanestesista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddolore' => $model->iddolore, 'idprocedure' => $model->idprocedure, 'idanestesista' => $model->idanestesista], [
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
            'iddolore',
            'idprocedure',
            'idanestesista',
            'orariodolore',
            'scaladolore',
        ],
    ]) ?>

</div>
