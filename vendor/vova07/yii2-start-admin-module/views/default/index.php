<?php

/**
 * Backend main page view.
 *
 * @var yii\base\View $this View
 */

use vova07\admin\Module;
use yii\helpers\Html;

$this->title = Module::t('admin', 'INDEX_TITLE');
$this->params['subtitle'] = Module::t('admin', 'INDEX_SUBTITLE'); ?>
<div class="jumbotron text-center">
  <h1><?php echo Html::encode($this->title); ?></h1>
  <p><?= Module::t('admin', 'INDEX_JUMBOTRON_MSG') ?></p>
</div>