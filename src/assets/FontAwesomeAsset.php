<?php

namespace yii2lab\misc\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
	public $sourcePath = '@bower/font-awesome';
	public $css = [
		'css/font-awesome.min.css'
	];
	public $depends = [
		'yii\bootstrap\BootstrapAsset',
	];
}
