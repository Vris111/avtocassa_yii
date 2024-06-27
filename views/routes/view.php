<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Tickets;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="routes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php if (Yii::$app->user->isGuest) { ?>
    <?php } elseif (Yii::$app->user->identity->getIsAdmin()) { ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number',
            'from_where',
            'to_where',
            'driver',
            'departure_date',
            'departure_time',
            'slots',
            'price',
        ],
    ]) ?>

    <?php if (!Yii::$app->user->isGuest) { ?>
        <p><?php
            $ticket = Tickets::findOne(['route_id' => $model->id, 'user_id' => Yii::$app->user->id]);
            if ($ticket) {
                echo Html::a('Вернуть билет', ['/routes/buy', 'id' => $model->id], ['class' => 'btn btn-outline-warning']);
            } elseif ($model->slots > 0 && !Yii::$app->user->isGuest) {
                echo Html::a('Купить билет', ['/routes/buy', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);
            } elseif ($route->slots > 0) {
                echo Html::a('Войдите чтобы купить билет', ['/site/login'], ['class' => 'btn btn-outline-primary']);
            } else {
                echo Html::a('Нет мест', ['#', 'id' => $model->id], ['class' => 'btn btn-outline-secondary disabled']);
            }
        ?></p>
    <?php } ?>

</div>
