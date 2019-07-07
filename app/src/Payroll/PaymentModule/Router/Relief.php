<?php

namespace Payroll\PaymentModule\Router;

class Relief extends \Strukt\Contract\Router{

	/**
	* @Route(/relief/all)
	* @Method(POST)
	*/
	public function findAll(){

		$relief = $this->get("hr.ctr.Relief")->findAll();

		return self::json($relief->toArray());
	}

	/**
	* @Route(/relief/{id:int})
	* @Method(POST)
	*/
	public function find($id){

		$relief = $this->get("hr.ctr.Relief")->getById($id);

		return self::json($relief->toArray());
	}
}