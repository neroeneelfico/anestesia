<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Convenzioni */

$this->title = 'Create Convenzioni';
$this->params['breadcrumbs'][] = ['label' => 'Convenzionis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
