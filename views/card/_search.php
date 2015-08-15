<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-search" xmlns="http://www.w3.org/1999/html">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_INLINE,

    ]); ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'number') ?>

    <?php
    echo $form->field($model, 'expires_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter expires date'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss',
        ]
    ]);?>
    <?php
    echo $form->field($model, 'release_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter release date'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss',
        ]
    ]);?>

    <?php $status_list = ['Активна','Неактивна','Просроченна']; ?>
    <?php echo $form->field($model, 'status')->dropDownList($status_list, ['prompt'=>'Выберете статус']); ?>

    <?php // echo $form->field($model, 'using_date')  ?>
    <?php // echo $form->field($model, 'cash') ?>

    <p>
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    </p>

    <?php ActiveForm::end(); ?>

</div>
