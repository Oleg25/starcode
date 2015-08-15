<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

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

    <?php
    echo $form->field($model, 'using_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter using date'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss',
        ]
    ]);?>


    <?= $form->field($model, 'status')->textInput() ?>


    <?= $form->field($model, 'cash')->textInput() ?>
    <br />

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
