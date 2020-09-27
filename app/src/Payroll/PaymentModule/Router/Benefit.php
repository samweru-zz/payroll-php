<?php

namespace Payroll\PaymentModule\Router;

class Benefit extends \Strukt\Contract\Router{

	/**
	* @Route(/benefit/all)
	* @Method(POST)
	*/
	public function findAll(){

		$benefits = $this->get("pa.ctr.Benefit")->all();

     	return self::json($benefits);
	}

	/**
	* @Route(/benefit/{id:int})
	* @Method(POST)
	*/
	public function findOne($id){

		$benefit = $this->get("pa.ctr.Benefit")::getById($id);

     	return self::json($tBenefit);
	}

}