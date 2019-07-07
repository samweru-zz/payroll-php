<?php

namespace Payroll\AuthModule\Controller;

class User extends \Strukt\Contract\Controller{

	public function find($id){

		$user = $this->da()->find("User", $id);

    	return $user;
	}

	
	public function findAll(){

		$query = $this->da()->query("SELECT u.id, u.username FROM ~User u");

		$users = $query->getResult();

		return $users;
	}

	public function exists($username, $password){

		$user = $this->da()->repo('User')->findOneBy(array(

			"username"=>$username,
			"password"=>sha1($password)
		));
		
	    if(empty($user))
	    	return false;
	    
	    return true;
	}
}