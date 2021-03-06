<?php

class BaseController {

    public static function get_user_logged_in() {



        if (isset($_SESSION['username'])) {

            $user_id = $_SESSION['user_id'];
            $user = User::find($user_id);
            return $user->user_id;
        }

        return null;
    }

    public static function check_logged_in() {

        if (!isset($_SESSION['username'])) {
            View::make('userviews/login.html', array('message' => 'Please login first!'));
        }
    }

}
