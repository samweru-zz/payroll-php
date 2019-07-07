<?php

namespace Payroll\PaymentModule\Controller;

class Relief extends \Strukt\Contract\Controller{

	public function ls(){

	    $query = $this->da()->query("SELECT r.id, r.name FROM ~Relief r");

	    $rates = $query->getResult();

	    return $rates;
	}

	public function all(){

	    $rates = $this->da()->repo("Relief")->findAll();

	    return $rates;
	}

	public function getById($id){

    	$rate = $this->da()->find("Relief", $id);

    	return $rate;
	}
}