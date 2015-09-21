<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\Qrcode */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Qrcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-view">

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
            'title',
            'formats_id',
            'content:ntext',
            // 'image_url:url',
            // ['label'=>'image_url','value'=>yii\i18n\Formatter::asImage($model->image_url)],
            [
                'attribute'=>'image_url',
                'value'=>$model->image_url,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'redirect_url:url',
            'post_location',
            'scans',
            'status_id',
            'deleted',
            'memo',
            'author_id',
            'batch_id',
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
