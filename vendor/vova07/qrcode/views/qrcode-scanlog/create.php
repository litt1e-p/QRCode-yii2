<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeScanlog */

$this->title = 'Create Qrcode Scanlog';
$this->params['breadcrumbs'][] = ['label' => 'Qrcode Scanlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-scanlog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
