<?php

namespace Payroll\PaymentModule\Controller;

class Nhif extends \Strukt\Contract\Controller{

	public function all(){

	    $rates = $this->da()->repo("Nhif")->findAll();

	    return $rates;
	}

	public function getById($id){

    	$rate = $this->da()->find("Nhif", $id);

    	return $rate;
	}
}