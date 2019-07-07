<?php

namespace Payroll\PaymentModule\Router;

use Payroll\PaymentModule\Controller\Nhif as NhifC;
use Payroll\PaymentModule\Transformer\Nhif as NhifT;

class Nhif extends \App\Data\Router{

	/**
	* @Route(/nhif/all)
	* @Method(POST)
	*/
	public function findAll(){

		$nhif_all = $this->get("hr.ctr.Nhif")->findAll();

		// return self::json(array("page"=>1,
  //                             	"rows"=>$lsNhif,
  //                             	"total"=>count($lsNhif)));
    	return self::json($nhif_all);
	}

	/**
	* @Route(/nhif/{id:int})
	* @Method(POST)
	*/
	public function find($id){

		$nhif = $this->get("hr.ctr.Nhif")->getById($id);

		return self::json($nhif->toArray());
	}
}