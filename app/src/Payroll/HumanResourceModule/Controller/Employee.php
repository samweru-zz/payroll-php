<?php

namespace Payroll\HumanResourceModule\Controller;

use Strukt\Util\Str;

class Employee extends \Strukt\Contract\Controller{

	public function all(){

    	$employees = $this->da()->repo("Employee")->findAll();

    	return $employees;
	}

	public function getById($id){

     	$employee = $this->da()->find("Employee", $id);

     	return $employee;
	}

	public function pager(Array $filter = [], $start_from, $page_size){

		$qb = $this->da()->repo("Employee")->createQueryBuilder("e");

		$qb->addSelect("p.name as title");
		$qb->leftjoin("e.post", "p");

		if(array_key_exists("name", $filter)){

			$qb->where("e.othernames LIKE :name")
				->orWhere("e.surname LIKE :name")
				->orWhere("p.name LIKE :name");

			$qb->setParameter("name", $filter["name"]);
		}

		$qb->orderBy("e.id", "ASC");

		$pager = $this->da()->paginate($qb, $start_from, $page_size);

		return $pager;
	}
}