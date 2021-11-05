<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trainer */

$this->title = 'Update Trainer: ' . $model->t_name;
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->t_id, 'url' => ['view', 'id' => $model->t_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trainer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
