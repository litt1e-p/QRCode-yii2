<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeScanlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcode-scanlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'qrcode_id') ?>

    <?= $form->field($model, 'scan_ip') ?>

    <?= $form->field($model, 'terminal_type') ?>

    <?= $form->field($model, 'scan_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
