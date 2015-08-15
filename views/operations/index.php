<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'serial_number',
            'using_date',
            'debit_kredit',
        ],
    ]); ?>

</div>
