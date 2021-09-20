<?php

use common\models\Convenzioni;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConvenzioniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenzioni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenzioni-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a('Create Convenzioni', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'titolo',
            'citta',
            'quantitamax',
            [
                    'label' => 'Selezionati',
                    'value' => function ($model){
                        return $model->getQuanti();
                    }
            ],
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <br>
    <br>
    <b>Scegli il tuo gruppo</b>
    <?php $form = ActiveForm::begin(); ?>
    <?=
    $form->field($model, 'convenzioni_id')
        ->dropDownList(
            ArrayHelper::map(Convenzioni::find()->asArray()->all(), 'id', 'titolo')
        )->label("");
    ?>
    <?=
    $form->field($model, 'convenzioni_tempo')->hiddenInput(['value'=> date('Y-m-d H:i:s')])->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Seleziona convenzione', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?= $form->errorSummary($model); ?>

</div>
