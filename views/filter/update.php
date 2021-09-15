<?php

use yii\helpers\Html;

$this -> title = 'Изменить фильтр: ' . $model -> title;
$this -> params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this -> params['breadcrumbs'][] = ['label' => $model -> title, 'url' => ['view', 'id' => $model -> id]];
$this -> params['breadcrumbs'][] = 'Изменить';

?>

<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <?= $this -> render('_form', [
        'model' => $model,
        'types' => $types,
    ]) ?>

</div>
