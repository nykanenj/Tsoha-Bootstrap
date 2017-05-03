<?php

/*
 * UserController controls registering, logging in and logging out
 */

class UserController extends BaseController {

    public static function register() {
        View::make('userviews/register.html');
    }

    public static function registernewuser() {
        $params = $_POST;
        
        $attributes = array(
            'username' => $params['username'],
            'password' => $params['password'],
            'adminrights' => 0
        );

        $newuser = new User($attributes);
        $errors = $newuser->errors();

        if (count($errors) == 0) {
            $newuser->save();
            Redirect::to('/login', array('message' => 'Account created successfully! Please login'));
        } else {
            View::make('userviews/register.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function login() {
        View::make('userviews/login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {

            View::make('userviews/login.html', array('error' => 'Wrong username or password!', 'username' => $params['username']));
        } else {

            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['username'] = $user->username;
            Redirect::to('/overview', array('message' => 'Tervetuloa takaisin ' . $user->username));
        }
    }

    public static function logout() {
        $_SESSION['username'] = null;
        Redirect::to('/login', array('message' => 'Logout successful!'));
    }

}
