<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii2lab\helpers\Page;
use yii2lab\notify\domain\widgets\Alert;

AppAsset::register($this);
?>

<?php Page::beginDraw(['class' => "hold-transition login-page"]) ?>

	<?= Alert::widget() ?>
	
	<?= $content ?>

<?php Page::endDraw() ?>
