<?php
class controller_admin_users extends Controller_Admin
{

    public function action_index()
    {
        $config = array(
            'pagination_url' => 'admin/users/index',
            'total_items'    => DB::count_records('users'),
            'uri_segment'    => 4,
        );
        Pagination::set_config($config);
        $data['posts'] = Model_User::find('all', array(
            'related'   => array('profiles'),
            'limit'     => Pagination::$per_page,
            'offset'    => Pagination::$offset,
            'order_by'  => array(array('id', 'desc')),
        ));
        $data['pager'] = Pagination::create_links();
        $this->template->title      = "Users";
        $this->template->content    = View::forge('admin/users/index', $data, false);

    }

    public function action_view($id = null)
    {
        $data['post'] = Model_User::find($id);

        $this->template->title = "User";
        $this->template->content = View::forge('admin/view', $data);

    }
}
