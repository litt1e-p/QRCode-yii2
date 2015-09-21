<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\vova07\qrcode\models\Qrcode */

$this->title = 'Create Qrcode';
$this->params['breadcrumbs'][] = ['label' => 'Qrcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
