<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tickets $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'route_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
