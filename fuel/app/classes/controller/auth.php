<?php

class controller_auth extends \NinjAuth\Controller
{
    public static $linked_redirect = '/auth/linked';
    public static $login_redirect = '/auth/login';
    public static $register_redirect = '/auth/register';
    public static $registered_redirect = '/auth/registered';

    public function before()
    {
		Package::load('ninjauth');
        parent::before();
    }


    public function action_login() {
        if (Auth::check()) {
            Session::set_flash('flash_message', 'ようこそ、'. Auth::get_screen_name() .'さん。');
            return Response::redirect('/user/' . Auth::get_screen_name());
        }

        return Response::redirect('/auth/session/twitter');
        // todo loginしていない場合の処理を作る
        return $this->response;
    }


    public function action_logout() {
        Auth::logout();
        Session::set_flash('flash_message', 'ログアウトしました');
        return Response::redirect('/');
    }

    /*
     *   Example registered action for SimpleAuth (Should work with others)
     *
     */
    public function action_registered()
    {
        $auth       = Auth::instance();
        $user_id    = Session::get_flash('ninjauth.user_id');

        if (isset($user_id)) {
            Auth::instance()->force_login($user_id);
            return Response::redirect('/user/' . Auth::get_screen_name());
        }
        return $this->response;
    }

    public function action_register()
    {
        $user_hash = Session::get('ninjauth.user');
        $authentication = Session::get('ninjauth.authentication');

        $strategy = \NinjAuth\Strategy::forge($authentication['provider']);

		$email  = Input::post('email') ?: Arr::get($user_hash, 'email');
        $val    = Validation::forge();
        $val->add('email', 'email')->add_rule('required')->add_rule('valid_email');

        if (Input::method() != 'POST' || $val->run() === false) {
            return View::forge('register', array(
                'user'  => (object) compact('email'),
                'error' => $val->error('email'),
            ));
        }

        // todo トランザクション
        $user_id  = $strategy->adapter->create_user(array(
            'username'  => Arr::get($user_hash, 'nickname'),
            'email'     => $email,
        ));

        if ($user_id) {
            \NinjAuth\Model_Authentication::forge(array(
                'user_id'       => $user_id,
                'provider'      => $authentication['provider'],
                'uid'           => $authentication['uid'],
                'access_token'  => $authentication['access_token'],
                'secret'        => $authentication['secret'],
                'refresh_token' => $authentication['refresh_token'],
                'expires'       => $authentication['expires'],
                'created_at'    => time(),
            ))->save();

            Model_Profile::forge(array(
                'full_name'     => Arr::get($user_hash, 'name'),
                'image'         => Arr::get($user_hash, 'image'),
                'location'      => Arr::get($user_hash, 'location'),
                'description'   => Arr::get($user_hash, 'description'),
                'website'       => Arr::get($user_hash, 'urls.Website'),
                'twitter'       => Arr::get($user_hash, 'urls.Twitter'),
                'user_id'       => $user_id,
            ))->save();

            Session::set_flash('ninjauth.user_id', $user_id);
            Response::redirect(static::$registered_redirect);
        }
    }
}
