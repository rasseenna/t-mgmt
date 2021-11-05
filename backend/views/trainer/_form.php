<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Slot;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Trainer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 't_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(array('rows'=>3,'cols'=>5),['maxlength' => true]) ?>

    <?= $form->field($model, 'job_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageUrl')->fileInput() ?>


    <?php 

        $slots=Slot::find()->all();

        $listData=ArrayHelper::map($slots,'s_id','s_name');

        echo $form->field($model, 's_id')->dropDownList(
                $listData,
                ['prompt'=>'Select...']
                );

                ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
