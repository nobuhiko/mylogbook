<?php

class Controller_Base extends Controller_Template {

    const STATUS_DISP = '2'; // post.status

    public function before()
	{
		parent::before();

		// Assign current_user to the instance so controllers can use it
        $this->current_user = Auth::check() ? Model_User::find_by_username(Auth::get_screen_name()) : null;

		// Set a global variable so views can use it
        View::set_global('current_user', $this->current_user);

        if ($this->current_user) {
            $this->status_where = array(array('status', '!=', null));
        } else {
            $this->status_where = array(array('status' ,self::STATUS_DISP));
        }
	}

}
