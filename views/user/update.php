<?php

use yii\helpers\Html;

$this -> title = 'Изменить пользователя: ' . $model -> username;
$this -> params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this -> params['breadcrumbs'][] = ['label' => $model -> username, 'url' => ['view', 'id' => $model -> id]];
$this -> params['breadcrumbs'][] = 'Изменить';
?>

<div>

    <h1><?= Html::encode($this -> title) ?></h1>

    <?= $this -> render('_form', [
        'model' => $model,
    ]) ?>

</div>
