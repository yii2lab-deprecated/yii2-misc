<?php

use yii2lab\widgets\Menu;
use yii2lab\helpers\MenuHelper;

$menu = include(COMMON_DATA_DIR . DS . 'menu' . DS . 'navbar_backend.php');
echo Menu::widget([
	'options'=>['class' => 'sidebar-menu'],
	'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
	'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
	'activateParents' => true,
	'items' => MenuHelper::gen($menu['mainMenu']),
]);
