<?php
require_once(__DIR__.'/plugin.php');
$mailchimp=new plugin_mailchimp();
var_dump($mailchimp->runFromCustomForm(NULL,NULL,
	array(
		array(
			'apiFieldToMapTo' => 'name',
			'id' => 'name',
		),
		array(
			'apiFieldToMapTo' => 'email',
			'id' => 'email',
		),
	),
	array(
		':name'=>'z b',
		':email'=>'zbloomquist@fullambit.com',
	)));