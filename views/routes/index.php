<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Салам Брат!</h1>

        <p class="lead">Покупай билеты у нас.</p>

        <a class='btn btn-lg btn-success' href="/routes/search">Купить билет</a>
    </div>

  
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
        <p>
            <?= Html::a('Купить билет', ['buy', 'id' => $route->id], ['class' => 'btn btn-outline-primary'])?>
        </p>
    </div>
    <hr>
<?php } ?>