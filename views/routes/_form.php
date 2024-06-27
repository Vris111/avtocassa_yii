<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\BusTypes;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="routes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'from_where')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_where')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bus_type')->dropDownList(\yii\helpers\ArrayHelper::map(BusTypes::find()->all(), 'id', 'name'),['prompt' => 'Select bus type'])?>

    <?= $form->field($model, 'departure_date')->textInput(['placeholder' => 'YYYY-MM-DD']) ?>

    <?= $form->field($model, 'departure_time')->textInput(['placeholder' => 'HH:MM']) ?>

    <?= $form->field($model, 'slots')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Create new route', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
