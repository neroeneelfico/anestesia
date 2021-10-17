<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Procedure */

$this->title = 'Crea Procedure';
$this->params['breadcrumbs'][] = ['label' => 'Procedure', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
