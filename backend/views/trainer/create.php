<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trainer */

$this->title = 'Create Trainer';
$this->params['breadcrumbs'][] = ['label' => 'Trainers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
