<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Slot;
use backend\models\Course;
use backend\models\Trainer;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 

$courses=Course::find()->all();

$listData=ArrayHelper::map($courses,'c_id','c_name');

echo $form->field($model, 'c_id')->dropDownList(
        $listData,
        ['prompt'=>'Select...']
        );

        ?>
<?php
$dataCategory=ArrayHelper::map(Trainer::find()->asArray()->all(), 't_id', 't_name');
	echo $form->field($model, 't_id')->dropDownList($dataCategory, 
	         ['prompt'=>'-Select Trainer-',
			  'onchange'=>'
				$.post( "'.Yii::$app->urlManager->createUrl('slot/lists?id=').'"+$(this).val(), function( data ) {
				  $( "select#title" ).html( data );
				});
			']); 
	
	$dataPost=ArrayHelper::map(Slot::find()->asArray()->all(), 's_id', 's_name');
	echo $form->field($model, 's_id')
        ->dropDownList(
            $dataPost,           
            ['s_id'=>'s_name']
        );

        ?>



    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
   <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::class, [
        //'language' => 'ru',
        'dateFormat' => 'php:Y-m-d',
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'showButtonPanel' => true,
            'minDate' => 'date("d-m-Y")',
            'yearRange' => '1990:date(Y)',
        ],
        'options' => ['class' => 'form-control', 'readOnly' => true, 'placeholder' => 'Enter the Publish Date', 'value' => date('d-m-Y')],
    ])
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
