<?php

use yii\helpers\Html;

$this -> title = 'Создать фильтр';
$this -> params['breadcrumbs'][] = ['label' => 'Фильтры', 'url' => ['index']];
$this -> params['breadcrumbs'][] = $this -> title;

?>

<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <?= $this -> render('_form', [
        'model' => $model,
        'types' => $types,
    ]) ?>

</div>
