<?php

namespace Payroll\AuthModule\Controller;

class Role extends \Strukt\Contract\Controller{

	public function ls(){

	    $query = $this->da()->query("SELECT r.id, r.name FROM ~Role r");

	    $roles = $query->getResult();

	    return $roles;
	}

	public function all(){

	    $roles = $this->da()->repo("Role")->findAll();

	    return $roles;
	}

	public function getById($id){

    	$role = $this->da()->find("Role", $id);

    	return $role;
	}

	public function add($name, $descr){

		try{

			$role = $this->get("Role");
			$role->setName($name);
			$role->setDescr($descr);
			$role->save();

			return $role->getId();
		}
		catch(\Exception $e){

			$this->core()->get("app.logger")->error($e->getMessage());

			return null;
		}
	}

	public function update($id, $name, $descr){

		try{

			$role = self::getById($id);
			$role->setName($name);
			$role->setDescr($descr);	
			$role->save();

			return true;
		}
		catch(\Exception $e){

			$this->core()->get("app.logger")->error($e->getMessage());

			return false;
		}
	}
}