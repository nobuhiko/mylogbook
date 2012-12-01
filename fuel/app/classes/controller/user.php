<?php

class controller_user extends Controller_Base
{

    public function before() {
        parent::before();
        $data = array();
        $this->username = $this->param('username');
        $this->template = View::forge('template');

        // todo related
        $data['user'] = Model_User::find_by_username($this->username);

        if (empty($data['user'])) {
            Response::redirect('welcome/404', 'location', 404);
        }

        $data['log'] = Model_Post::count(array(
            'related'   => array('users'),
            'where'     => array_merge(array(array('users.username', $this->username)), $this->status_where),
        ));
        $this->log_count = $data['log'];

        $data['total_dive_time'] = Model_Post::summary_dive_time($this->username);
        $data['home_location'] = Model_Post::get_home_location($this->username);
        $data['first_date'] = Model_Post::get_first_date($this->username);
        $data['creature'] = Model_Post::summary_report_count($this->username);

        $this->template->content = View::forge('user/profile', $data); // 共通tpl
        $this->template->title = ' | ' . $this->username;
    }

    public function action_log()
    {

        $config = array(
            'pagination_url' => 'user/' . $this->username,
            'total_items'    => $this->log_count,
            'per_page'       => 20,
            'uri_segment'    => 3,
            'num_links'      => 5,
            'template' => array(
                'wrapper_start'           => '<div class="pagination pagination-centered"><ul>',
                'wrapper_end'             => '</ul></div>',
                'page_start'              => '',
                'page_end'                => '',
                'previous_start'          => '<li>',
                'previous_end'            => '</li>',
                'previous_inactive_start' => '<li class="disabled">',
                'previous_inactive_end'   => '</li>',
                'previous_mark'           => '',
                'next_start'              => '<li>',
                'next_end'                => '</li>',
                'next_inactive_start'     => '<li class="disabled">',
                'next_inactive_end'       => '</li>',
                'next_mark'               => '',
                'active_start'            => '<li class="active">',
                'active_end'              => '</li>',
                'regular_start'           => '<li>',
                'regular_end'             => '</li>'
            )
        );
        Pagination::set_config($config);

        $data['posts'] = Model_Post::find('all', array(
            'related'   => array('users'),
            'where'     => array_merge(array(array('users.username', $this->username)), $this->status_where),
            'order_by'  => array('serial_dive_no' => 'desc'),
            'limit'     => Pagination::$per_page,
            'offset'    => Pagination::$offset,
        ));
        $data['pager'] = Pagination::create_links();

        $this->template->content->content = View::forge('user/log', $data, false);

        return $this->template;
    }

    public function action_creatures() {

        $data['reports'] = Model_Post::summary_report($this->username);
        $this->template->content->content = View::forge('user/creatures', $data);

        return $this->template;
    }

}