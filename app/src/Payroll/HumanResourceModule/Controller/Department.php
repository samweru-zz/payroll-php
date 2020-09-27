<?php

namespace Payroll\HumanResourceModule\Controller;

class Department extends \Strukt\Contract\Controller{

	public function ls(){

	    $query = $this->da()->query("SELECT d.id, d.name FROM ~Department d");

	    $depts = $query->getResult();

	    return $depts;
	}

	public function all(){

     	$depts = $this->da()->repo('Department')->findAll();

     	return $depts;
	}

	public function getById($id){

     	$dept = $this->da()->find("Department", $id);

     	return $dept;
	}
}