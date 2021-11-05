<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrainerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trainers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trainer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 't_id',
            't_name',
            'age',
            'email:email',
            'job_title',
            //'mobile_number',
            //'s_id',
            
            //'imageUrl',
            //'address',
            //'t_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
