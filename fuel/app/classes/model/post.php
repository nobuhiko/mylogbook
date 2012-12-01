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

    protected static $_belongs_to = array('users');

    protected static $_many_many = array(
        'creatures' => array(
            'key_from'          => 'id',
            'key_through_form'  => 'post_id',
            'table_through'     => 'posts_creatures',
            'key_through_to'    => 'creature_id',
            'model_to'          => 'Model_Creature',
            'key_to'            => 'id',
            'cascade_save'      => true,
            'cascade_delete'    => false,
        ),
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('serial_dive_no', 'Dive No', 'valid_string[numeric]');
        $val->add_field('date', 'Date', 'max_length[255]');
        $val->add_field('location', 'Location', 'max_length[255]');
        $val->add_field('point', 'Point', 'max_length[255]');
        $val->add_field('point_type', 'Point Type', 'valid_string[numeric]');
        //$val->add_field('purpose_of_dive', 'Purpose Of Dive', 'valid_string[numeric]');
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
        //$val->add_field('computer', 'Computer', 'valid_string[numeric]');
        $val->add_field('tank', 'Tank', 'valid_string[numeric]');
        $val->add_field('tank_cap', 'Tank Cap', 'valid_string[numeric]');
        $val->add_field('visibility', 'Visibility', 'max_length[255]');
        //$val->add_field('impression', 'Impression', 'valid_string[numeric]');
        $val->add_field('buddy', 'Buddy', 'max_length[255]');
        $val->add_field('instructor_and_guide', 'Instructor And Guide', 'max_length[255]');
        //$val->add_field('report', 'Report', '');
        //$val->add_field('comment', 'Comment', '');
        $val->add_field('status', 'Status', 'valid_string[numeric]');
        //$val->add_field('user_id', 'User Id', 'valid_string[numeric]');

        return $val;
    }

    public static function calc_diff_of_time($end, $first) {
        if (empty($end) || empty($first)) {
            return null;
        }
        return intval((strtotime($end) - strtotime($first)) / (60));
    }

    public static function get_last_serial_dive_no($user_id) {

        $res = DB::select(array(DB::expr('max(serial_dive_no)'), 'last_dive_no'))
            ->from('posts')
            ->where('user_id', '=', $user_id)
            ->limit(1)
            ->execute()
            ->as_array();
        return isset($res[0]['last_dive_no']) ? $res[0]['last_dive_no'] + 1 : 1;
    }

    public static function get_first_date($username) {

        $res = DB::select(array(DB::expr('min(date)'), 'date'))
            ->from('posts')
            ->join('users', 'LEFT')
            ->on('posts.user_id', '=', 'users.id')
            ->where('username', '=', $username)
            ->and_where('date', '!=', '') // is not null
            ->limit(1)
            ->execute()
            ->as_array();

        return isset($res[0]['date']) ? $res[0]['date'] : null;
    }

    public static function get_home_location($username) {

        $res = DB::select('location')
            ->from('posts')
            ->join('users', 'LEFT')
            ->on('posts.user_id', '=', 'users.id')
            ->and_where('username', '=', $username)
            ->group_by('location')
            ->order_by(DB::expr('count(location)'), 'DESC')
            ->limit(1)
            ->execute()
            ->as_array();

        return isset($res[0]['location']) ? $res[0]['location'] : null;
    }

    public static function summary_dive_time($username) {

        $res = DB::select(array(DB::expr('sum(posts.dive_time)'), 'total_dive_time'))
            ->from('posts')
            ->join('users', 'LEFT')
            ->on('posts.user_id', '=', 'users.id')
            ->and_where('username', '=', $username)
            ->execute()
            ->as_array();

        return isset($res[0]['total_dive_time']) ? $res[0]['total_dive_time'] : 0;
    }

    public static function summary_report($username) {

        // todo index or チューニング
        $res = DB::select('creatures.*', array(DB::expr('count(posts_creatures.creature_id)'), 'postcount'))
            ->from('creatures')
            ->join('posts_creatures', 'LEFT')
            ->on('creatures.id', '=', 'posts_creatures.creature_id')
            ->join('posts', 'LEFT')
            ->on('posts.id', '=', 'posts_creatures.post_id')
            ->join('users', 'LEFT')
            ->on('posts.user_id', '=', 'users.id')
            ->where('creatures.name', '!=', '')
            ->and_where('username', '=', $username)
            ->group_by('creatures.id')
            //->order_by(DB::expr('count(posts_creatures.creature_id)'), 'DESC')
            ->order_by('creatures.name', 'ASC')
            ->execute()
            ->as_array();
        return $res;
    }

    public static function summary_report_count($username) {

        // todo index or チューニング
        $res = DB::select(array(DB::expr('count(distinct posts_creatures.creature_id)'), 'count'))
            ->from('creatures')
            ->join('posts_creatures', 'LEFT')
            ->on('creatures.id', '=', 'posts_creatures.creature_id')
            ->join('posts', 'LEFT')
            ->on('posts.id', '=', 'posts_creatures.post_id')
            ->join('users', 'LEFT')
            ->on('posts.user_id', '=', 'users.id')
            ->where('creatures.name', '!=', '')
            ->and_where('username', '=', $username)
            ->execute();

        $result_arr = $res->current();
        $count = $result_arr['count'];

        return $count;
    }

    public static function getTypeaheadList($col) {
        if (Auth::check() === false) return json_encode(array());
        $user_id = Auth::get_user_id();

        $res = DB::select($col)
            ->from('posts')
            ->where('user_id', '=', $user_id[1])
            ->group_by($col)
            ->execute()
            ->as_array();

        return json_encode(\Arr::pluck($res, $col));
    }
}
