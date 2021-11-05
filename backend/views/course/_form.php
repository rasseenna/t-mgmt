<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Course */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(array('rows'=>5,'cols'=>5),['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'c_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
