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
				
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
				Redirect::to('/overview', array('message' => 'Tervetuloa takaisin ' . $user->username));
			
			}
	}
	
	public static function logout(){
	
		$_SESSION['username'] = null;
		Redirect::to('/login', array('message' => 'Logout successful!'));
		
		
	}
	
}
