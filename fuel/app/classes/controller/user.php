<?php
class controller_user extends Controller_Base
{

    public function before() {
        parent::before();
        $data = array();
        $this->username = $this->param('username');
        $this->template = View::forge('template');

        // todo related
        $this->user = $data['user'] = Model_User::find_by_username($this->username);

        if (empty($data['user'])) {
            Response::redirect('welcome/404', 'location', 404);
        }

        $data['log'] = Model_Post::count(array(
            'where'     => array_merge(array(array('user_id', $this->user->id)), $this->status_where),
        ));
        $this->log_count = $data['log'];

        Model_Post::summary_userdata($data, $this->user->id);

        $this->template->set_global('description', $this->user->profiles->description);
        $this->template->content = View::forge('user/profile', $data); // 共通tpl
        $this->template->title = ' | ' . $this->username . 'のログ';
    }

    public function action_log()
    {
        $config = array(
            'pagination_url' => 'user/' . $this->username,
            'total_items'    => $this->log_count,
            'uri_segment'    => 3,
        );
        Pagination::set_config($config);

        $data['posts'] = Model_Post::find('all', array(
            'where'     => array_merge(array(array('user_id', $this->user->id)), $this->status_where),
            'order_by'  => array(array('serial_dive_no','desc')),
            'limit'     => Pagination::$per_page,
            'offset'    => Pagination::$offset,
        ));

        $data['pager'] = Pagination::create_links();
        $this->template->content->content = View::forge('user/log', $data, false);

        return $this->template;
    }

    public function action_year()
    {
        $config = array(
            'pagination_url' => 'user/' . $this->username . '/year/' . $this->param('year'),
            //'total_items'    => $this->log_count,
            'uri_segment'    => 5,
        );
        //Pagination::set_config($config);

        $data['posts'] = DB::select()
            ->from('posts')
            ->where('user_id', '=', $this->user->id)
            ->and_where('status', self::STATUS_DISP)
            ->and_where(DB::expr("DATE_FORMAT(date, '%Y')"), $this->param('year'))
            ->order_by('serial_dive_no', 'desc')
          //  ->limit(Pagination::$per_page)
          //  ->offset(Pagination::$offset)
            ->as_object()
            ->execute();

        $data['pager'] = Pagination::create_links();
        $this->template->content->content = View::forge('user/log', $data, false);

        return $this->template;
    }

    public function action_creatures() {

        $data['reports'] = Model_Post::summary_report($this->user->id);
        $this->template->content->content = View::forge('user/creatures', $data);

        return $this->template;
    }

}
