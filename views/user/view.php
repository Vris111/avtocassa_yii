<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<h1>Мои билеты</h1>

<ul>
    <?php foreach ($tickets as $ticket):?>
        <li>
            <?= $ticket->number?> 
            (Маршрут: <?= $ticket->route->from_where?> - <?= $ticket->route->to_where?>, Цена: <?= $ticket->route->price?>)
        </li>
    <?php endforeach;?>
</ul>

</div>