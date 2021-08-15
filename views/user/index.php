<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this -> title = 'Пользователи';
$this -> params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];

?>

<div>
    <h1><?= Html::encode($this -> title) ?></h1>
    <p>
        <button class="btn btn-primary" onClick = "window.location.reload(true)"><span class="glyphicon glyphicon-refresh"></span></button>
        <?= HTML::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
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
                'username',
                'phone_number',
                'token',
                'email:email',
                'birthday',
                'reg_date',
                'last_visit',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
    ?>

</div>
