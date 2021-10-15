<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dolore */

$this->title = 'Create Dolore';
$this->params['breadcrumbs'][] = ['label' => 'Dolores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dolore-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
