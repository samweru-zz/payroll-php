<?php

namespace Payroll\PaymentModule\Router;

class Relief extends \Strukt\Contract\Router{

	/**
	* @Route(/relief/all)
	* @Method(POST)
	*/
	public function findAll(){

		$relief_all = $this->get("pa.ctr.Relief")->all();

		foreach($relief_all as $relief)
			$rsRelief[] = $relief->toArray();

		return self::json($rsRelief);
	}

	/**
	* @Route(/relief/{id:int})
	* @Method(POST)
	*/
	public function find($id){

		$relief = $this->get("pa.ctr.Relief")->getById($id);

		return self::json($relief->toArray());
	}
}