<?php

use yii\helpers\Html;
use yii2lab\helpers\ModuleHelper;
use yii2module\article\widgets\PostList;
use yii2module\lang\widgets\LangSelector;

?>

<div class="pull-left">
	<p>
	&copy; <?= Yii::$app->name . SPC . date('Y') ?>


		<?php if(YII_ENV_DEV) { ?>
			<!--
			<span class="text-muted"> | </span>
			<?= Html::a(t('main', 'documentation'), param('url.frontend') . 'doc') ?>
			-->
			<?php if(config("modules.guide")) { ?>
				<span class="text-muted"> | </span>
				<?= Html::a(t('guide/main', 'title'), ['/guide']) ?>
			<?php } ?>

			<?php if(config("modules.gii") && Yii::$app->user->can('backend.*')) { ?>
				<span class="text-muted"> | </span>
				<?= Html::a('Gii', ['/gii']) ?>
			<?php } ?>

			<?php if(!in_array('debug', config('bootstrap'))) { ?>
                <span class="text-muted"> | </span>
				<?= Html::a('Yii Debugger', ['/debug/default/view', 'panel' => 'request']) ?>
			<?php } ?>
   
		<?php } ?>

		<?php if(APP == FRONTEND) { ?>

			<?php if(Yii::$app->user->can('backend.*')) { ?>
				<span class="text-muted"> | </span>
				<?= Html::a(t('main', 'go_to_backend'), param('url.backend')) ?>
			<?php } ?>

		<?php } ?>

	</p>

	<?php if(APP == FRONTEND) { ?>

		<?php if(config("modules.article")) { ?>
			<p>
		        <?= PostList::widget() ?>
			</p>
		<?php } ?>

	<?php } ?>

</div>

<div class="pull-right">

	<?php if(ModuleHelper::has('lang')) { ?>
		<i class="fa fa-language" title="<?= t('lang/main', 'title') ?>"></i>
        <span class="dropup">
            <?= LangSelector::widget() ?>
        </span>
	<?php } ?>

	&nbsp;

	<?= Yii::powered() ?>
</div>