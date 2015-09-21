<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\QrcodeScanlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcode-scanlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qrcode_id')->textInput() ?>

    <?= $form->field($model, 'scan_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'terminal_type')->textInput() ?>

    <!-- <?= $form->field($model, 'scan_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
