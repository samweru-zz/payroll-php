<?php

namespace Payroll\PaymentModule\Router;

class Nhif extends \Strukt\Contract\Router{

	/**
	* @Route(/nhif/all)
	* @Method(POST)
	*/
	public function findAll(){

		$nhif_all = $this->get("pa.ctr.Nhif")->all();

		foreach($nhif_all as $nhif)
			$rsNhif[] = $nhif->toArray();

    	return self::json($rsNhif);
	}

	/**
	* @Route(/nhif/{id:int})
	* @Method(POST)
	*/
	public function find($id){

		$nhif = $this->get("pa.ctr.Nhif")->getById($id);

		return self::json($nhif->toArray());
	}
}