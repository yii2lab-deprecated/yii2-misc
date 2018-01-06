<?php

namespace yii2lab\misc\assets;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle
{
	public $sourcePath = '@yii2lab/misc/assets/main';
	public $js = [
		'js/function.js',
	];
	
	function init() {
		parent::init();
		$env = env(null);
		$config['env'] = [
			'YII_DEBUG' => $env['YII_DEBUG'],
			'YII_ENV' => $env['YII_ENV'],
			'url' => $env['url'],
		];
		$jsCode = 'app = ' . json_encode($config) . ';';
		Yii::$app->view->registerJs($jsCode, View::POS_HEAD);
	}
}
