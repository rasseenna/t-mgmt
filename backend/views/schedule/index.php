<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'sh_id',
            'c.c_name',
            't.t_name',
            's.s_name',
            'location',
            //'date',
            //'sh_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
