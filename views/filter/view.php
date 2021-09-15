<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\grid\GridView;

$this -> title = 'Просмотр фильтра: ' . $model -> title;
$this -> params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this -> params['breadcrumbs'][] = 'Просмотр';

?>
<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <p>

        <?= Html::a('Изменить', ['update', 'id' => $model -> id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model -> id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действиетльно хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'type',
            'value',
        ],
    ]) ?>

   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
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