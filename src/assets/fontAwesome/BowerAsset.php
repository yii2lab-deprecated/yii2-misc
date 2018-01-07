<?php

namespace yii2lab\misc\assets\fontAwesome;

use yii\web\AssetBundle;

class BowerAsset extends AssetBundle
{
	public $sourcePath = '@bower/font-awesome';
	public $css = [
		'css/font-awesome.min.css'
	];
	public $depends = [
		'yii\bootstrap\BootstrapAsset',
	];
}
