<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\vova07\qrcode\models\QrcodeBatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qrcode Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-batch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Qrcode Batch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'description:ntext',
            // 'formats_id',
            //
            'base_url:url',
            [
                'label'=>'tools',
                'format'=>'raw',
                'value' => function($data){
                    $url = '/backend/qrcode/qrcode/create/?bid='.$data['id'];
                    return Html::a(' printQrcode', $url, ['title' => 'generate qrcode','class' => 'glyphicon glyphicon-plus']);

                    // return Html::a('<a data-pjax="0" aria-label="generate Qrcode" title="generate Qrcode" href=""><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;generate Qrcode</a>', $url, ['title' => 'generate qrcode']);
                }
            ],

            // 'redirect_url:url',
            // 'start_time:datetime',
            // 'end_time:datetime',
            // 'status_id',
            // 'deleted',
            // 'memo',
            // 'author_id',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
