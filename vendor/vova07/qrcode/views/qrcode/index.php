<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\vova07\qrcode\models\QrcodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qrcodes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Qrcode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'formats_id',
            'content:ntext',
            // 'image_url:url',
            // 'redirect_url:url',
            // 'post_location',
            'scans',
            // 'status_id',
            // 'deleted',
            // 'memo',
            // 'author_id',
            'batch_id',
            // 'created_at',
            // 'updated_at',
            ['label'=>'qrcode image','format' => ['image',['width'=>'100','height'=>'100']],'value'=>function($data) { return $data->image_url;},],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
