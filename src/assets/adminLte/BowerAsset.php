<?php

namespace yii2lab\misc\assets\adminLte;

use yii\web\AssetBundle;

class BowerAsset extends AssetBundle
{
	public $sourcePath = '@bower/admin-lte/dist';
	public $js = [
		'js/app.min.js',
	];
	public $css = [
		'css/AdminLTE.min.css',
		'css/skins/skin-blue.min.css',
	];
	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
	
}
