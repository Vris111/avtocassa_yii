<?php

use yii\helpers\Html;
use app\models\Tickets;
/** @var yii\web\View $this */

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Салам Брат!</h1>
        <p class="lead">Покупай билеты у нас.</p>
    </div>

    <form action="/routes/search" method="get" class="search-form-wrapper col-md-4">
        <label for="from_where" class="sr-only">Откуда:</label>
        <input type="text" id="from_where" class="form-control" placeholder="Откуда" name="from_where" />
        <br />
        <label for="to_where" class="sr-only">Куда:</label>
        <input type="text" id="to_where" name="to_where" class="form-control" placeholder="Куда" />
        <br />
        <label for="departure_date" class="sr-only">Дата отправления:</label>
        <input type="date" id="departure_date" name="departure_date" class="form-control" />
        <br />
        <button type="submit" class="btn btn-primary">Найти рейс</button>
    </form>
  
    
</div>
<?php foreach ($routes as $route) { ?>
    <div>
        <h2>Маршрут №<?= $route->number ?></h2>
        <p>Откуда: <?= $route->from_where ?></p>
        <p>Куда: <?= $route->to_where ?></p>
        <p>Дата отправления: <?= $route->departure_date ?></p>
        <p>Время отправления: <?= $route->departure_time ?></p>
        <p>Количество мест: <?= $route->slots ?></p>
        <p>Цена: <?= $route->price ?></p>
        <p><?php
            $ticket = Tickets::findOne(['route_id' => $route->id, 'user_id' => Yii::$app->user->id]);
            if ($ticket) {
                echo Html::a('Вернуть билет', ['/routes/buy', 'id' => $route->id], ['class' => 'btn btn-outline-warning']);
            } elseif ($route->slots > 0 && !Yii::$app->user->isGuest) {
                echo Html::a('Купить билет', ['/routes/buy', 'id' => $route->id], ['class' => 'btn btn-outline-primary']);
            } elseif ($route->slots > 0) {
                echo Html::a('Войдите чтобы купить билет', ['/site/login'], ['class' => 'btn btn-outline-primary']);
            } else {
                echo Html::a('Нет мест', ['#', 'id' => $route->id], ['class' => 'btn btn-outline-secondary disabled']);
            }
        ?></p>
    </div>
    <hr>
<?php } ?>