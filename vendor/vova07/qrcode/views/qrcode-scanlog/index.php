<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\vova07\qrcode\models\QrcodeScanlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qrcode Scanlogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-scanlog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Qrcode Scanlog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'qrcode_id',
            'scan_ip',
            'terminal_type',
            [
                'label'=>'scan_at',
                'format' => ['date', 'Y-m-d H:i:s'],
                'value' => function($data) { return $data->scan_at;},
            ],
            // 'scan_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
