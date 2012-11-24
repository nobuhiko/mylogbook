<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'welcome(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'user/:username/creatures' => array('user/creatures', 'name' => 'creatures'),
	'user/:username(/:num)?' => array('user/log', 'name' => 'log'),
);
