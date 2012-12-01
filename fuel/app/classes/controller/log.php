<?php
class controller_log extends Controller_Base
{
    public function before()
    {
        parent::before();
        \Lang::load('log');
    }

    public function action_view($id = null)
    {
        $data['post'] = Model_Post::find($id, array(
            'related' => array('users'),
            'where' => $this->status_where,
        ));

        if (empty($data['post'])) {
            Response::redirect('welcome/404', 'location', 404);
        }

        $this->template->title = " | " . $data['post']->date . 'のログ';
        $this->template->content = View::forge('log/view', $data);
    }

    public function action_create()
    {
        if ($this->current_user == null) {
            Response::redirect('welcome/404', 'location', 404);
        }

        $fieldset = $this->_fieldset()->repopulate();

        if (Input::method() == 'POST') {

            if ($fieldset->validation()->run()) {
                $fields = $fieldset->validated();

                $post = Model_Post::forge();
                foreach($fields as $key => $value) {
                    $post->$key = $value;
                }

                $post->dive_time = Model_Post::calc_diff_of_time($post->exit, $post->entry);
                $post->user_id = $this->current_user->id;

                // todo トランザクション
                $post->creatures = Model_Creature::parseCreatures(Input::post('report'));

                if ($post->save()) {
                    Session::set_flash('success', e('Added log #'.$post->id.'.'));
                    Response::redirect('/log/edit/' . $post->id);
                } else {
                    Session::set_flash('error', e('Could not save post.'));
                }
            }
        }

        $this->template->set_global('fieldset', $fieldset, false);
        $this->template->title = ' | ログを書く';
        $this->template->set_global('title', 'ログを書く', false);
        $this->template->content = View::forge('log/create');
    }

    public function action_edit($id = null)
    {
        $post = Model_Post::find($id, array(
            'where' => $this->status_where,
        ));

        if ($this->current_user == null || empty($post)) {
          Response::redirect('welcome/404', 'location', 404);
        }
        $fieldset = $this->_fieldset()->populate($post, true);

        if (Input::method() == 'POST') {
            if ($fieldset->validation()->run()) {
                $fields = $fieldset->validated();

                foreach($fields as $key => $value) {
                    $post->$key = $value;
                }

                $post->dive_time = Model_Post::calc_diff_of_time($post->exit, $post->entry);
                $post->user_id = $this->current_user->id;
                $post->creatures = Model_Creature::parseCreatures(Input::post('report'));

                if ($post->save()) {
                    Session::set_flash('success', e('Updated log #' . $id));

                    Response::redirect('log/edit/'.$id);
                } else {
                    Session::set_flash('error', e('Could not update log #' . $id));
                }
            }
        }

        $data['post'] = $post;
        $this->template->set_global('fieldset', $fieldset, false);
        $this->template->title = ' | ログを編集する';
        $this->template->set_global('title', 'ログを編集する', false);
        $this->template->content    = View::forge('log/edit', $data);
    }

    public function action_delete($id = null)
    {
        if ($this->current_user == null) {
          Response::redirect('welcome/404', 'location', 404);
        }

        if ($post = Model_Post::find($id, array(
            'where' => array('user_id' => $this->current_user->id),
        ))) {
            $post->delete();

            Session::set_flash('success', e('Deleted log #'.$id));
        } else {
            Session::set_flash('error', e('Could not delete log #'.$id));
        }

        Response::redirect('user/' . $this->current_user->username);

    }

    protected function _fieldset() {
        $zentohan = function($fieldset) { return mb_convert_kana($fieldset, 'a');};

        $fieldset = ViewForm\Fieldset::forge();

        $fieldset->add_text('serial_dive_no', __('serial_dive_no'), array('value' => Model_Post::get_last_serial_dive_no($this->current_user->id)))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'numeric')
            ->add_rule('max_length', 255);

        $fieldset->add_text('date', __('date'))
            ->add_rule('required')
            ->add_rule($zentohan)
            ->add_rule('max_length', 10);

        $fieldset->add_text('location', __('location'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 255);

        $fieldset->add_text('point', __('point'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 255);

        $fieldset->add_select('point_type', __('point_type'), Model_Lookup::items('post_point_type'))
            ->add_rule('max_length', 8);

        $fieldset->add_text('diving_shop', __('diving_shop'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 255);

        $fieldset->add_text('entry', __('entry'))
            ->add_rule($zentohan)
            ->add_rule('match_pattern', '/^(0[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1})$/')
            ->add_rule('max_length', 5);

        $fieldset->add_text('pressure_start', __('entry'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'numeric')
            ->add_rule('max_length', 8);

        $fieldset->add_text('exit', __('exit'))
            ->add_rule($zentohan)
            ->add_rule('match_pattern', '/^(0[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1})$/')
            ->add_rule('max_length', 5);

        $fieldset->add_text('pressure_end', __('exit'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'numeric')
            ->add_rule('max_length', 8);

        $fieldset->add_text('depth_of_water_ave', __('depth_of_water_ave'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'float')
            ->add_rule('max_length', 8);

        $fieldset->add_text('depth_of_water_max', __('depth_of_water_max'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'float')
            ->add_rule('max_length', 8);

        $fieldset->add_text('water_temp_bottom', __('water_temp_bottom'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'float')
            ->add_rule('max_length', 8);

        $fieldset->add_text('air_temp', __('air_temp'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'float')
            ->add_rule('max_length', 8);

        $fieldset->add_select('weather', __('weather'), Model_Lookup::items('post_weather'))
            ->add_rule('max_length', 8);

        $fieldset->add_select('suit', __('suit'), Model_Lookup::items('post_suit'))
            ->add_rule('max_length', 8);

        $fieldset->add_text('suit_thickness', __('suit'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'numeric')
            ->add_rule('max_length', 8);

        $fieldset->add_text('weight', __('weight'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'float')
            ->add_rule('max_length', 8);

        $fieldset->add_select('tank', __('tank'), Model_Lookup::items('post_tank'))
            ->add_rule('max_length', 8);

        $fieldset->add_text('tank_cap', __('tank_cap'))
            ->add_rule($zentohan)
            ->add_rule('valid_string', 'numeric')
            ->add_rule('max_length', 8);

        $fieldset->add_text('visibility', __('visibility'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 255);

            /*
            $fieldset->add_text('buddy', 'Buddy')
            ->add_rule('max_length', 255);

            $fieldset->add_text('instructor_and_guide', 'Instructor And Guide')
            ->add_rule('max_length', 255);
             */

        $fieldset->add_textarea('report', __('report'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 9999);

        $fieldset->add_textarea('comment', __('comment'))
            ->add_rule($zentohan)
            ->add_rule('max_length', 9999);

        $fieldset->add_select('status', __('status'), Model_Lookup::items('post_status', false))
            ->add_rule('max_length', 8);

        return $fieldset;
    }

}
