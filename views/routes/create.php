<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */

$this->title = 'Create Routes';

?>
<div class="routes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
