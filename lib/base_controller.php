<?php

  class BaseController{

    public static function get_user_logged_in(){
      
		if(isset($_SESSION['username'])){
			$user_id = $_SESSION['user'];  
			$user = User::find($user_id);
		  
			return $user;
		}
		return null;
    }

    public static function check_logged_in(){
		
		if(!isset($_SESSION['user'])){	
			View::make('questionnairewebpages/login.html', array('message' => 'Please login first!'));
		}
    }
    
    public static function user_logged_in(){
		
		return (isset($_SESSION['user']) != null);
			
		
    }

  }
