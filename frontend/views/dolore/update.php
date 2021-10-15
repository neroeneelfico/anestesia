<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dolore */

$this->title = 'Update Dolore: ' . $model->iddolore;
$this->params['breadcrumbs'][] = ['label' => 'Dolores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddolore, 'url' => ['view', 'iddolore' => $model->iddolore, 'idprocedure' => $model->idprocedure, 'idanestesista' => $model->idanestesista]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dolore-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
