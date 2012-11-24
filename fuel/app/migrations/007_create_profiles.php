<?php

namespace Fuel\Migrations;

class Create_profiles
{
	public function up()
	{
		\DBUtil::create_table('profiles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'full_name' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'image' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'location' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'description' => array('type' => 'text', 'null' => true),
			'website' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'twitter' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('profiles');
	}
}