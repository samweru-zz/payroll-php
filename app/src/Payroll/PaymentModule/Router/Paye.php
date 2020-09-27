<?php

namespace Payroll\PaymentModule\Router;

class Paye extends \Strukt\Contract\Router{

	/**
	* @Route(/paye/all)
	* @Method(POST)
	*/
	public function findAll(){

		$paye_all = $this->get("pa.ctr.Paye")->all();

		foreach($paye_all as $paye)
			$rsPaye[] = $paye->toArray();

		return self::json($rsPaye);
	}

	/**
	* @Route(/paye/{id:int})
	* @Method(POST)
	*/
	public function findOne($id){

		$paye = $this->get("pa.ctr.Paye")->getById($id);

		return self::json($paye->toArray());
	}
}