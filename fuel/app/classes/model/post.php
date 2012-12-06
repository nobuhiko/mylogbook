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

    public static function calc_diff_of_time($end, $first) {
        if (empty($end) || empty($first)) {
            return null;
        }
        return intval((strtotime($end) - strtotime($first)) / (60));
    }

    // profile data
    public static function summary_userdata(&$data, $user_id) {
        $data['total_dive_time'] = Model_Post::summary_dive_time($user_id);
        $data['first_date'] = Model_Post::get_first_date($user_id);
        $data['creature'] = Model_Post::summary_report_count($user_id);
        $data['yearly'] = Model_Post::get_yearly($user_id);
        $data['location'] = Model_Post::summary_location($user_id);
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

    const STATUS_DISP = '2'; // post.status

    public static function get_yearly($user_id) {

        $res = DB::select_array(array(
                array(DB::expr('count(id)'), 'count'),
                array(DB::expr("DATE_FORMAT( date,  '%Y')"), 'year')
            ))
            ->from('posts')
            ->where('user_id', '=', $user_id)
            ->and_where('status', self::STATUS_DISP)
            ->group_by('year')
            ->order_by('year', 'desc')
            ->execute()
            ->as_array();

        return $res;
    }

    public static function get_first_date($user_id) {

        $res = DB::select(array(DB::expr('min(date)'), 'date'))
            ->from('posts')
            ->where('user_id', '=', $user_id)
            ->and_where('date', '!=', '') // is not null
            ->and_where('status', self::STATUS_DISP)
            ->limit(1)
            ->execute()
            ->as_array();

        return isset($res[0]['date']) ? $res[0]['date'] : null;
    }


    public static function summary_dive_time($user_id) {

        $res = DB::select(array(DB::expr('sum(posts.dive_time)'), 'total_dive_time'))
            ->from('posts')
            ->where('user_id', '=', $user_id)
            ->and_where('status', self::STATUS_DISP)
            ->execute()
            ->as_array();

        return isset($res[0]['total_dive_time']) ? $res[0]['total_dive_time'] : 0;
    }


    public static function summary_location($user_id) {

        $res = DB::select(array('location', 'name'), array(DB::expr('count(location)'), 'count'))
            ->from('posts')
            ->where('location', '!=', '')
            ->and_where('user_id', '=', $user_id)
            ->and_where('status', self::STATUS_DISP)
            ->group_by('location')
            ->order_by('count', 'desc')
            ->execute()
            ->as_array();
        return $res;
    }

    public static function summary_report($user_id) {

        $res = DB::select('creatures.*', array(DB::expr('count(posts_creatures.creature_id)'), 'postcount'))
            ->from('creatures')
            ->join('posts_creatures', 'LEFT')
            ->on('creatures.id', '=', 'posts_creatures.creature_id')
            ->join('posts', 'LEFT')
            ->on('posts.id', '=', 'posts_creatures.post_id')
            ->where('creatures.name', '!=', '')
            ->and_where('user_id', '=', $user_id)
            ->and_where('status', self::STATUS_DISP)
            ->group_by('creatures.id')
            ->order_by('creatures.name', 'ASC')
            ->execute()
            ->as_array();
        return $res;
    }

    public static function summary_report_count($user_id) {

        // todo index or チューニング
        $res = DB::select(array(DB::expr('count(distinct posts_creatures.creature_id)'), 'count'))
            ->from('creatures')
            ->join('posts_creatures', 'LEFT')
            ->on('creatures.id', '=', 'posts_creatures.creature_id')
            ->join('posts', 'LEFT')
            ->on('posts.id', '=', 'posts_creatures.post_id')
            ->where('creatures.name', '!=', '')
            ->and_where('user_id', '=', $user_id)
            ->and_where('status', self::STATUS_DISP)
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
