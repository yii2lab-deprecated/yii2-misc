<?php

namespace yii2lab\misc\assets\main;

use yii\web\AssetBundle;

class StyleAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/main/dist';
	public $css = [
		'css/main.css',
	];
}
