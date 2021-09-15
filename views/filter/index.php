<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this -> title = 'Фильтры';
$this -> params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];

?>

<div>
    <h1><?= Html::encode($this -> title) ?></h1>
    <p>
        <button class="btn btn-primary" onClick = "window.location.reload(true)"><span class="glyphicon glyphicon-refresh"></span></button>
        <?= HTML::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--Таблица данных или GridView - это один из сверхмощных Yii виджетов.
    Он может быть полезен, если необходимо быстро создать административный раздел системы.
    GridView использует данные, как провайдер данных и отображает каждую строку используя columns
    для предоставления данных в таблице.-->
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'title',
                'type',
                'value',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    ?>
</div>
