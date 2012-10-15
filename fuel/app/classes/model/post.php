<?php
class Model_Post extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'serial_dive_no',
		'date',
		'location',
		'point',
		'point_type',
		'purpose_of_dive',
		'diving_shop',
		'entry',
		'exit',
		'water_temp_top',
		'water_temp_bottom',
		'depth_of_water_ave',
		'depth_of_water_max',
		'pressure_start',
		'pressure_end',
		'dive_time',
		'weather',
		'air_temp',
		'wind',
		'wind_type',
		'wave',
		'suit',
		'weight',
		'computer',
		'tank',
		'tank_cap',
		'visibility',
		'impression',
		'buddy',
		'instructor_and_guide',
		'report',
		'comment',
		'status',
		'user_id',
		'created_at',
		'updated_at',
		'suit_thickness',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('serial_dive_no', 'Serial Dive No', 'valid_string[numeric]');
		$val->add_field('date', 'Date', 'max_length[255]');
		$val->add_field('location', 'Location', 'max_length[255]');
		$val->add_field('point', 'Point', 'max_length[255]');
		$val->add_field('point_type', 'Point Type', 'valid_string[numeric]');
		$val->add_field('purpose_of_dive', 'Purpose Of Dive', 'valid_string[numeric]');
		$val->add_field('diving_shop', 'Diving Shop', 'max_length[255]');
		$val->add_field('entry', 'Entry', 'valid_string[numeric,punctuation]|max_length[5]');
		$val->add_field('exit', 'Exit', 'valid_string[numeric,punctuation]|max_length[5]');
		$val->add_field('water_temp_top', 'Water Temp Top', 'valid_string[numeric,dots]|max_length[255]');
		$val->add_field('water_temp_bottom', 'Water Temp Bottom', 'valid_string[numeric,dots]|max_length[255]');
		$val->add_field('depth_of_water_ave', 'Depth Of Water Ave', 'valid_string[numeric,dots]|max_length[255]');
		$val->add_field('depth_of_water_max', 'Depth Of Water Max', 'valid_string[numeric,dots]|max_length[255]');
		$val->add_field('pressure_start', 'Pressure Start', 'valid_string[numeric]');
		$val->add_field('pressure_end', 'Pressure End', 'valid_string[numeric]');
		$val->add_field('dive_time', 'Dive Time', 'valid_string[numeric]');
		$val->add_field('weather', 'Weather', 'valid_string[numeric]');
		$val->add_field('air_temp', 'Air Temp', 'valid_string[numeric,dots]|max_length[255]');
		$val->add_field('wind', 'Wind', 'max_length[255]');
		$val->add_field('wind_type', 'Wind Type', 'valid_string[numeric]');
		$val->add_field('wave', 'Wave', 'valid_string[numeric]');
		$val->add_field('suit', 'Suit', 'valid_string[numeric]');
		$val->add_field('weight', 'Weight', 'valid_string[numeric,dots]');
		$val->add_field('computer', 'Computer', 'valid_string[numeric]');
		$val->add_field('tank', 'Tank', 'valid_string[numeric]');
		$val->add_field('tank_cap', 'Tank Cap', 'valid_string[numeric]');
		$val->add_field('visibility', 'Visibility', 'max_length[255]');
		$val->add_field('impression', 'Impression', 'valid_string[numeric]');
		$val->add_field('buddy', 'Buddy', 'max_length[255]');
		$val->add_field('instructor_and_guide', 'Instructor And Guide', 'max_length[255]');
		$val->add_field('report', 'Report', '');
		$val->add_field('comment', 'Comment', '');
		$val->add_field('status', 'Status', 'valid_string[numeric]');
		//$val->add_field('user_id', 'User Id', 'valid_string[numeric]');

		return $val;
    }

    public static function calc_diff_of_time($end, $first) {
        return intval((strtotime($end) - strtotime($first)) / (60));
    }

}
