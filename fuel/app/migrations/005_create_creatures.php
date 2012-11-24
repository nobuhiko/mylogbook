<?php

namespace Fuel\Migrations;

class Create_creatures
{
	public function up()
	{
		\DBUtil::create_table('creatures', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'creature' => array('constraint' => 255, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('creatures');
	}
}