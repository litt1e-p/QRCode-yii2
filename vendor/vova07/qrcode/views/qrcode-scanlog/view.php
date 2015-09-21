<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeScanlog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Qrcode Scanlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-scanlog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'qrcode_id',
            'scan_ip',
            'terminal_type',
             [
                'attribute'=>'scan_at',
                'value'=>$model->scan_at,
                'format' => ['date', 'Y-m-d H:i:s'],
            ],
        ],
    ]) ?>

</div>
