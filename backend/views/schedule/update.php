<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */

$this->title = 'Update Schedule: ' . $model->sh_id;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sh_id, 'url' => ['view', 'sh_id' => $model->sh_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
