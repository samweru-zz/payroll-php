<?php

namespace Payroll\AuthModule\Router;

use Strukt\Http\Request;
use Strukt\Http\Response;
use Strukt\Http\RedirectResponse;

class Auth extends \Strukt\Contract\Router{

	/**
	* @Route(/login)
	* @Method(POST)
	*/
	public function login(Request $request){

		$username = $request->get("username");
		$password = $request->get("password");

		$login = $this->get("au.frm.Login", [$request]);
		$messages = $login->validate();

		if($messages["is_valid"])
		    if($this->get("au.ctr.User")->exists($username, $password))
		       return self::json(array(

		            "success"=>true, 
		            "message"=>"User successfully authenticated."
		        ));
		    else 
		        return self::json(array(

		            "success"=>false,
		            "message"=>"Failed to authenticate user!"
		        ));
		else
		    return self::json(array(

		        "success"=>false,
		        "message"=>"Invalid input!",
		        "form"=>$messages,
		    ));
	}

	/**
	* @Route(/logout)
	* @Method(GET)
	*/
	public function logout(Request $request){

		$request->getSession()->invalidate();

		return new RedirectResponse("/");
	}
}