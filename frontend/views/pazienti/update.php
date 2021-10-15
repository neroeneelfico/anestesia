<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pazienti */

$this->title = 'Update Pazienti: ' . $model->idpazienti;
$this->params['breadcrumbs'][] = ['label' => 'Pazientis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpazienti, 'url' => ['view', 'idpazienti' => $model->idpazienti]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pazienti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
