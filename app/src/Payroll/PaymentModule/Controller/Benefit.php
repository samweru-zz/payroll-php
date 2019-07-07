<?php

namespace Payroll\PaymentModule\Controller;

class Benefit extends \Strukt\Contract\Controller{

	public function all(){

     	$depts = $this->da()->repo('Benefit')->findAll();

     	return $depts;
	}

	public function getById($id){

     	$dept = $this->da()->find("Benefit", $id);

     	return $dept;
	}
}