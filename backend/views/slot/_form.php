<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_time')->textInput(['maxlength' => true]) ?>
 <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
