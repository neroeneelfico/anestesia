<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Convenzioni;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenzionis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Convenzioni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titolo',
            'citta',
            'quantitamax',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php $form = ActiveForm::begin(['id' => 'convenzioni-form']); ?>
    <?=
    $form->field($dataProvider, 'id')
        ->dropDownList(
            ArrayHelper::map(Convenzioni::find()->asArray()->all(), 'id', 'name')
        )
    ?>

</div>
