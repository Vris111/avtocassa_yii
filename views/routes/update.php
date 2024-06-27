<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */

$this->title = 'Update Routes: ' . $model->id;

?>
<div class="routes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
