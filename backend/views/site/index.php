<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

// $this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome To Fabricam TimeTable System!</h1>
    </div>
 <?php   //echo $webroot = Yii::app()->baseUrl;
 ?>
    <div class="body-content" style="background-color:#f7eac6; padding-left:70px; padding-bottom: 50px; padding-top:50px;">

        <div class="row">
            <div class="col-lg-3">
                <h2>Trainer</h2>
                <?= Html::a('Trainers List', ['../backend/trainer'], ['class' => 'btn btn-lg btn-success']) ?>
                
            </div>
            <div class="col-lg-3">
                <h2>Course</h2>

                <?= Html::a('Courses List', ['../backend/course'], ['class' => 'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Slot</h2>
                <?= Html::a('Slots List', ['../backend/slot'], ['class' => 'btn btn-lg btn-success']) ?>
            </div>
            <div class="col-lg-3">
                <h2>Schedule</h2>
                <?= Html::a('Scheduling List', ['../backend/schedule'], ['class' => 'btn btn-lg btn-success']) ?>
            </div>
        </div>

    </div>
</div>
