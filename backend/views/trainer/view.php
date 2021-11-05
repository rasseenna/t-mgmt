<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Trainer */

$this->title = $model->t_name;
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trainer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->t_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->t_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 't_id',
            't_name',
            'age',
            'email:email',
            'job_title',
            'mobile_number',
            's.s_name',
           // 'imageUrl',
           [
            'attribute' => 'imageUrl',
            'label' => 'Featured Image',
            'value' => Yii::$app->homeUrl . 'trainerImage/' . $model->imageUrl,
            'format' => ['image', ['width' => '356', 'height' => '187']],
            ],
            'address',
          //  't_status',
        ],
    ]) ?>

</div>
