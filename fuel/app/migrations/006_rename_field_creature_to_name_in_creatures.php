<?php

namespace Fuel\Migrations;

class Rename_field_creature_to_name_in_creatures
{
	public function up()
	{
		\DBUtil::modify_fields('creatures', array(
			'creature' => array('name' => 'name', 'type' => 'varchar', 'constraint' => 255)
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('creatures', array(
			'name' => array('name' => 'creature', 'type' => 'varchar', 'constraint' => 255)
		));
	}
}