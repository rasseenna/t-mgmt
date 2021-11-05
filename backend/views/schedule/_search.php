<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sh_id') ?>

    <?= $form->field($model, 'c_id') ?>

    <?= $form->field($model, 't_id') ?>

    <?= $form->field($model, 's_id') ?>

    <?= $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'sh_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
