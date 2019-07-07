<?php

namespace Payroll\AuthModule\Router;

use Strukt\Http\Request;
use Strukt\Http\Response;

class Index extends \Strukt\Contract\Router{

	/**
	* @Route(/)
	* @Method(GET)
	*/
	public function welcome(){

		return "</b>Strukt Works!<b>";
	}

	/**
	* @Route(/hello/world)
	* @Method(GET)
	*/
	public function helloWorld(){

		return self::htmlfile("public/static/index.html");
	}

	/**
	* @Route(/hello/{name:alpha})
	* @Method(GET)
	*/
	public function helloTo($name, Request $request){

		return sprintf("<b>Hello %s!</b>", $name);
	}

	/**
	* @Route(/users/all)
	* @Permission(user_all)
	* @Method(GET)
	*/
	public function getAllUsers(){

		return $this->get("au.ctr.User")->getAll();
	}

	/**
	* @Route(/user)
	* @Method(GET)
	*/
	public function getUser(Request $request){

		$id = $request->query->get("id");

		return $this->get("au.ctr.User")->find($id);
	}

	/**
	* @Route(/test)
	* @Method(GET)
	*/
	public function testException(){

		throw new \Exception("Whoops!");
	}
}