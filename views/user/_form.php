<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form -> field($model, 'username') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'phone_number') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'token') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'email') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'birthday') ?>
    <?= $form -> field($model, 'reg_date') ?>
    <?= $form -> field($model, 'last_visit') ?>

    <div>
        <?= Html::submitButton($model -> isNewRecord ? 'Создать' : 'Изменить', ['class' => $model -> isNewRecord ? 'btn btn-success'
        : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
