<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeBatch */

$this->title = 'Update Qrcode Batch: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qrcode Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qrcode-batch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
