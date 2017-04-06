<?php

class User extends BaseModel {
	
	public $user_id, $username, $password;
	
	public function __construct($attributes){
	
		parent::__construct($attributes);
	
	}
	
	public static function authenticate($user, $pwd){
		
		$query = DB::connection()->prepare('SELECT * FROM usertable WHERE username = :username AND password = :password LIMIT 1');
		$query->execute(array('username' => $user, 'password' => $pwd));
		$row = $query->fetch();
		
		if($row){
			$loginuser = new User(array(
			             'user_id'  => $row['user_id'],
			             'username' => $row['username'],
			             'password' => $row['password']
					 ));
					 
			return $loginuser;
			
		}else{
			return null;
		}
		
	}
	
	public static function find($user_id) {

        $query = DB::connection()->prepare('SELECT * FROM usertable WHERE user_id = :user_id');
        $query->execute(array('user_id' => $user_id));
        $rows = $query->fetchAll();

 
            $data = array(
                'user_id' => $row['user_id'],
                'username' => $row['username'],
                'adminrights' => $row['adminrights']
            );

            return $data;

    }
	
	
}
