<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TrainerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 't_id') ?>

    <?= $form->field($model, 't_name') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'job_title') ?>

    <?php // echo $form->field($model, 'mobile_number') ?>

    <?php // echo $form->field($model, 's_id') ?>

    <?php // echo $form->field($model, 'imageUrl') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 't_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
