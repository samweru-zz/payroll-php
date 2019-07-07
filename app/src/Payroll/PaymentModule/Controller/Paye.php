<?php

namespace Payroll\PaymentModule\Controller;

class Paye extends \Strukt\Contract\Controller{

	public function all(){

	    $rates = $this->da()->repo("Paye")->findAll();

	    return $rates;
	}

	public function getById($id){

    	$rate = $this->da()->find("Paye", $id);

    	return $rate;
	}
}