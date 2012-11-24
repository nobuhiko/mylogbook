<?php
return array(
	'version' => 
	array(
		'app' => 
		array(
			'default' => 
			array(
				0 => '001_create_users',
				1 => '002_create_posts',
				2 => '003_create_lookups',
				3 => '004_add_suit_thickness_to_posts',
				4 => '005_create_creatures',
				5 => '006_rename_field_creature_to_name_in_creatures',
				6 => '007_create_profiles',
			),
		),
		'module' => 
		array(
		),
		'package' => 
		array(
			'ninjauth' => 
			array(
				0 => '001_create_authentications',
				1 => '002_add_refresh_tokens',
				2 => '003_Allow_null_secret',
			),
		),
	),
	'folder' => 'migrations/',
	'table' => 'migration',
);
