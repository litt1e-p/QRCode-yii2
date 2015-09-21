<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeBatch */

$this->title = 'Create Qrcode Batch';
$this->params['breadcrumbs'][] = ['label' => 'Qrcode Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-batch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
