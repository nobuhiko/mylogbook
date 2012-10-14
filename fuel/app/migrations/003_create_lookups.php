<?php

namespace Fuel\Migrations;

class Create_lookups
{
	public function up()
	{
		\DBUtil::create_table('lookups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'code' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 255, 'type' => 'varchar'),
			'position' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('lookups');
	}
}