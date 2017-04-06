<?php

class UserController extends BaseController {
	
	public static function login(){
		View::make('questionnairewebpages/login.html');
	}
	
	public static function handle_login(){
			$params = $_POST;
			
			$user = User::authenticate($params['username'], $params['password']);
			
			if(!$user){
			
				View::make('questionnairewebpages/login.html', array('error' => 'Wrong username or password!', 'username' => $params['username']));
					
			}else{
				
				$_SESSION['user'] = $user->user_id;
				
				Redirect::to('/overview', array('message' => 'Tervetuloa takaisin ' . $user->username));
			
			}
	}
}
