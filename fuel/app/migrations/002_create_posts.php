<?php

namespace Fuel\Migrations;

class Create_posts
{
	public function up()
	{
		\DBUtil::create_table('posts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'serial_dive_no' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'date' => array('constraint' => 255, 'type' => 'varchar'),
			'location' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'point' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'point_type' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'purpose_of_dive' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'diving_shop' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'entry' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'exit' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'water_temp_top' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'water_temp_bottom' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'depth_of_water_ave' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'depth_of_water_max' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'pressure_start' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'pressure_end' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'dive_time' => array('constraint' => 11, 'type' => 'int'),
			'weather' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'air_temp' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'wind' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'wind_type' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'wave' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'suit' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'weight' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'computer' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'tank' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'tank_cap' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'visibility' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'impression' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'buddy' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'instructor_and_guide' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'report' => array('type' => 'text', 'null' => true),
			'comment' => array('type' => 'text', 'null' => true),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('posts');
	}
}