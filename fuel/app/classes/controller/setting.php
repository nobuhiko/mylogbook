<?php

class controller_setting extends Controller_Template
{
    public function before()
    {
        parent::before();
        !Auth::check() and Response::redirect('/auth/login');
        $this->current_user = Model_User::find_by_username(Auth::get_screen_name());
        $this->template->set_global('current_user', $this->current_user);
    }

    public function action_index()
    {
        Response::redirect('/setting/profile');
    }

    public function action_profile()
    {

        $post = Model_Profile::find('first', array('where' => array('user_id' => $this->current_user->id)));
        $fieldset = $this->_fieldset()->populate($post);

        if ($fieldset->validation()->run() == true) {
            $fields = $fieldset->validated();
            $post->full_name    = $fields['full_name'];
            $post->location     = $fields['location'];
            $post->description  = $fields['description'];
            $post->website      = $fields['website'];
            $post->camera       = $fields['camera'];
            $post->user_id      = $this->current_user->id;

            if ($post->save()) {
                Session::set_flash('success', e('Updated Profile'));
                Response::redirect('setting/profile');
            }
        } else {
            $fieldset->repopulate();
            //Session::set_flash('error', $fieldset->validation()->errors());
        }
        $this->template->set_global('fieldset', $fieldset, false);

        $this->template->title = 'Setting &raquo; Profile';
        $this->template->content = View::forge('setting/profile');
    }

    protected function _fieldset() {
        $fieldset = ViewForm\Fieldset::forge();

        $fieldset->add_text('full_name', 'Name')
            ->add_rule('required')
            ->add_rule('max_length', 255);

        $fieldset->add_text('location', 'Location')
            ->add_rule('max_length', 255);

        $fieldset->add_textarea('description', 'description')
            ->add_rule('max_length', 9999);

        $fieldset->add_text('website', 'Website')
            ->add_rule('valid_url');

        $fieldset->add_text('camera', 'Camera')
            ->add_rule('max_length', 255);

        return $fieldset;
    }
}
