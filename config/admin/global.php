<?php

return [

    'global_comment_status'=>true,//是否开启所有文章评论

	'welcomeType' => 'slide',

	// 自定义用户名
	'username' => 'username',

	// 默认主题
	'theme' => 'inspinia',

	// id加密配置
	'encrypt' => [
		'main' => true,
		'permission' => true,
		'role' => true,
		'user' => true,
		'menu' => true,
	],
	'cache' => [
		'menuList' => 'menuList'
	]
];