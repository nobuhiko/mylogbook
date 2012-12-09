<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller
{

    public function before() {
        parent::before();
        $this->template = View::forge('template');
    }
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
    {
        $this->template->content = View::forge('welcome/index');
        $this->template->title = ' | ダイビングプロフィール登録サービス';
        return $this->template;
	}

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
        $this->template->content = View::forge('welcome/404');
        $this->template->title = ' | 404 Not Found';
        return Response::forge($this->template, 404);
	}
}
