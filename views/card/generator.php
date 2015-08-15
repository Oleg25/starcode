<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 15.08.2015
 * Time: 10:06
 */
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generator">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <label for="qty">Количество</label>
    <input type="text" name="qty" size="4" id="qty">

    <?php
    echo $form->field($model, 'expires_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
           'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss',
        ]
    ]);?>


    <div class="form-group">
        <?= Html::submitButton('Generate', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>