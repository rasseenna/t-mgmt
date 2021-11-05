<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Slot */

$this->title = 'Update Slot: ' . $model->s_name;
$this->params['breadcrumbs'][] = ['label' => 'Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->s_id, 'url' => ['view', 'id' => $model->s_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
