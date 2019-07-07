<?php

namespace Payroll\PaymentModule\Router;

use Payroll\PaymentModule\Controller\Paye as PayeC;
use Payroll\PaymentModule\Transformer\Paye as PayeT;

class Paye extends \App\Data\Router{

	/**
	* @Route(/paye/all)
	* @Method(POST)
	*/
	public function findAll(){

		$paye_all = $this->get("hr.ctr.Paye")->findAll();

		return self::json($paye_all);
	}

	/**
	* @Route(/paye/{id:int})
	* @Method(POST)
	*/
	public function findOne($id){

		$paye = $this->get("hr.ctr.Paye")->getById($id);

		return self::json($paye->toArray());
	}
}