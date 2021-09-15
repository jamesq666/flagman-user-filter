<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form -> field($model, 'title') -> textInput (['maxlength' => true]) ?>
    <?= $form -> field($model, 'type') -> dropDownList ($types) ?>
    <?= $form -> field($model, 'value') -> textInput (['maxlength' => true]) ?>

    <div>
        <?= Html::submitButton($model -> isNewRecord ? 'Создать' : 'Изменить', ['class' => $model -> isNewRecord ? 'btn btn-success'
        : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
