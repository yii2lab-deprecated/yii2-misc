<?php

namespace yii2lab\misc\assets;

use Yii;
use yii\web\AssetBundle;
use yii2lab\helpers\yii\FileHelper;

class AdminLteAsset extends AssetBundle
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
		'yii2lab\misc\assets\FontAwesomeAsset',
	];
	
	function init() {
		parent::init();
		$basePath = '@yii2lab/misc/assets/dist/';
		$jsCode = FileHelper::load(Yii::getAlias($basePath . 'adminLte.js'));
		Yii::$app->view->registerJs($jsCode);
		$cssCode = FileHelper::load(Yii::getAlias($basePath . 'adminLte.css'));
		Yii::$app->view->registerCss($cssCode);
	}
	
}
