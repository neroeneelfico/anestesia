<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pazienti */

$this->title = 'Inserisci pazienti';
$this->params['breadcrumbs'][] = ['label' => 'Pazienti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pazienti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
