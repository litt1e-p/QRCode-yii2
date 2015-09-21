<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeBatch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qrcode Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-batch-view">

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
            'name',
            'description:ntext',
            'formats_id',
            'base_url:url',
            'redirect_url:url',
            'start_time:datetime',
            'end_time:datetime',
            'status_id',
            'deleted',
            'memo',
            'author_id',
            [
                'attribute'=>'created_at',
                'value'=>$model->created_at,
                'format' => ['date', 'Y-m-d H:i:s'],
            ],
            [
                'attribute'=>'updated_at',
                'value'=>$model->updated_at,
                'format' => ['date', 'Y-m-d H:i:s'],
            ],
        ],
    ]) ?>

</div>
