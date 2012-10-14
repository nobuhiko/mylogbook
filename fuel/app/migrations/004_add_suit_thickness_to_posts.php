<?php

namespace Fuel\Migrations;

class Add_suit_thickness_to_posts
{
	public function up()
	{
		\DBUtil::add_fields('posts', array(
			'suit_thickness' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('posts', array(
			'suit_thickness'
    
		));
	}
}