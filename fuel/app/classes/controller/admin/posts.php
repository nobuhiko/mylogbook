<?php
class Controller_Admin_Posts extends Controller_Admin
{

	public function action_index()
	{
        $data['posts'] = Model_Post::find('all', array(
            'where'     => array('user_id'          => $this->current_user->id),
            'order_by'  => array('serial_dive_no'   => 'desc')
        ));
		$this->template->title      = "Posts";
		$this->template->content    = View::forge('admin/posts/index', $data);

	}

	public function action_view($id = null)
	{
        $data['post'] = Model_Post::find($id, array(
            'where' => array('user_id' => $this->current_user->id),
        ));

		$this->template->title = "Post";
		$this->template->content = View::forge('admin/posts/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if ($val->run())
			{
				$post = Model_Post::forge(array(
					'serial_dive_no' => Input::post('serial_dive_no'),
					'date' => Input::post('date'),
					'location' => Input::post('location'),
					'point' => Input::post('point'),
					'point_type' => Input::post('point_type'),
					'purpose_of_dive' => Input::post('purpose_of_dive'),
					'diving_shop' => Input::post('diving_shop'),
					'entry' => Input::post('entry'),
					'exit' => Input::post('exit'),
					'dive_time' => Model_Post::calc_diff_of_time(Input::post('exit'), Input::post('entry')),
					'water_temp_top' => Input::post('water_temp_top'),
					'water_temp_bottom' => Input::post('water_temp_bottom'),
					'depth_of_water_ave' => Input::post('depth_of_water_ave'),
					'depth_of_water_max' => Input::post('depth_of_water_max'),
					'pressure_start' => Input::post('pressure_start'),
					'pressure_end' => Input::post('pressure_end'),
					'weather' => Input::post('weather'),
					'air_temp' => Input::post('air_temp'),
					'wind' => Input::post('wind'),
					'wind_type' => Input::post('wind_type'),
					'wave' => Input::post('wave'),
					'suit' => Input::post('suit'),
					'suit_thickness' => Input::post('suit_thickness'),
					'weight' => Input::post('weight'),
					'computer' => Input::post('computer'),
					'tank' => Input::post('tank'),
					'tank_cap' => Input::post('tank_cap'),
					'visibility' => Input::post('visibility'),
					'impression' => Input::post('impression'),
					'buddy' => Input::post('buddy'),
					'instructor_and_guide' => Input::post('instructor_and_guide'),
					'report' => Input::post('report'),
					'comment' => Input::post('comment'),
					'status' => Input::post('status'),
					'user_id' => $this->current_user->id,
				));

				if ($post and $post->save())
				{
					Session::set_flash('success', e('Added post #'.$post->id.'.'));

					Response::redirect('admin/posts');
				}

				else
				{
					Session::set_flash('error', e('Could not save post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/posts/create');

	}

	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);
		$val  = Model_Post::validate('edit');

		if ($val->run())
		{
			$post->serial_dive_no = Input::post('serial_dive_no');
			$post->date = Input::post('date');
			$post->location = Input::post('location');
			$post->point = Input::post('point');
			$post->point_type = Input::post('point_type');
			$post->purpose_of_dive = Input::post('purpose_of_dive');
			$post->diving_shop = Input::post('diving_shop');
			$post->entry = Input::post('entry');
			$post->exit = Input::post('exit');
			$post->water_temp_top = Input::post('water_temp_top');
			$post->water_temp_bottom = Input::post('water_temp_bottom');
			$post->depth_of_water_ave = Input::post('depth_of_water_ave');
			$post->depth_of_water_max = Input::post('depth_of_water_max');
			$post->pressure_start = Input::post('pressure_start');
			$post->pressure_end = Input::post('pressure_end');
            $post->dive_time = Model_Post::calc_diff_of_time(Input::post('exit'), Input::post('entry'));
			$post->weather = Input::post('weather');
			$post->air_temp = Input::post('air_temp');
			$post->wind = Input::post('wind');
			$post->wind_type = Input::post('wind_type');
			$post->wave = Input::post('wave');
			$post->suit = Input::post('suit');
			$post->weight = Input::post('weight');
			$post->computer = Input::post('computer');
			$post->tank = Input::post('tank');
			$post->tank_cap = Input::post('tank_cap');
			$post->visibility = Input::post('visibility');
			$post->impression = Input::post('impression');
			$post->buddy = Input::post('buddy');
			$post->instructor_and_guide = Input::post('instructor_and_guide');
			$post->report = Input::post('report');
			$post->comment = Input::post('comment');
            $post->status = Input::post('status');
			$post->user_id = $this->current_user->id;

			if ($post->save())
			{
				Session::set_flash('success', e('Updated post #' . $id));

				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', e('Could not update post #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$post->serial_dive_no = $val->validated('serial_dive_no');
				$post->date = $val->validated('date');
				$post->location = $val->validated('location');
				$post->point = $val->validated('point');
				$post->point_type = $val->validated('point_type');
				$post->purpose_of_dive = $val->validated('purpose_of_dive');
				$post->diving_shop = $val->validated('diving_shop');
				$post->entry = $val->validated('entry');
				$post->exit = $val->validated('exit');
				$post->water_temp_top = $val->validated('water_temp_top');
				$post->water_temp_bottom = $val->validated('water_temp_bottom');
				$post->depth_of_water_ave = $val->validated('depth_of_water_ave');
				$post->depth_of_water_max = $val->validated('depth_of_water_max');
				$post->pressure_start = $val->validated('pressure_start');
				$post->pressure_end = $val->validated('pressure_end');
				$post->dive_time = $val->validated('dive_time');
				$post->weather = $val->validated('weather');
				$post->air_temp = $val->validated('air_temp');
				$post->wind = $val->validated('wind');
				$post->wind_type = $val->validated('wind_type');
				$post->wave = $val->validated('wave');
				$post->suit = $val->validated('suit');
				$post->weight = $val->validated('weight');
				$post->computer = $val->validated('computer');
				$post->tank = $val->validated('tank');
				$post->tank_cap = $val->validated('tank_cap');
				$post->visibility = $val->validated('visibility');
				$post->impression = $val->validated('impression');
				$post->buddy = $val->validated('buddy');
				$post->instructor_and_guide = $val->validated('instructor_and_guide');
				$post->report = $val->validated('report');
				$post->comment = $val->validated('comment');
				$post->status = $val->validated('status');
				$post->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}

		$this->template->title      = "EditPost";
        $this->template->content    = View::forge('admin/posts/edit');


	}

	public function action_delete($id = null)
	{
        if ($post = Model_Post::find($id, array(
            'where' => array('user_id' => $this->current_user->id),
        ))) {
			$post->delete();

			Session::set_flash('success', e('Deleted post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}

		Response::redirect('admin/posts');

	}


}
