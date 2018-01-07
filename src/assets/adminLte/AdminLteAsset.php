<?php

namespace yii2lab\misc\assets\adminLte;

use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/adminLte/dist';
	public $js = [
		'js/sidebarToggle.js',
	];
	public $css = [
		'css/fixMenu.css',
	];
	public $depends = [
		'yii2lab\misc\assets\adminLte\BowerAsset',
	];
	
}
