<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BusRoute */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск маршрутов автобусов';

?>

<h1><?= Html::encode($this->title)?></h1>

<?php $form = ActiveForm::begin([
'action' => ['index'],
'method' => 'get',
]); ?>

<?= $form->field($searchModel, 'from_where') ?>
<?= $form->field($searchModel, 'to_where') ?>
<?= $form->field($searchModel, 'departure_date') ?>
<div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>


<?php foreach ($dataProvider->getModels() as $model) { ?>
    <div>
        <h2>Маршрут №<?= $model->number ?></h2>
        <p>Откуда: <?= $model->from_where ?></p>
        <p>Куда: <?= $model->to_where ?></p>
        <p>Дата отправления: <?= $model->departure_date ?></p>
        <p>Время отправления: <?= $model->departure_time ?></p>
        <p>Количество мест: <?= $model->slots ?></p>
        <p>Цена: <?= $model->price ?></p>
    </div>
    <hr>
<?php } ?>