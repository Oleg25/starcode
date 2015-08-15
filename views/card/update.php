<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Card */

$this->title = 'Update Card: ' . ' ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
