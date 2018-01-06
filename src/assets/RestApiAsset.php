<?php

namespace yii2lab\misc\assets;

use Yii;
use yii\web\AssetBundle;
use yii2lab\helpers\yii\FileHelper;

class RestApiAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/restApi';
	public $js = [
		'js/main.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
		'yii2lab\misc\assets\MainAsset',
	];
	
}
