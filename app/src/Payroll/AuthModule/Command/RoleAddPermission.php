<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;

/**
* role:add:perm  Create Role Permission
*/
class RoleAddPermission extends \App\Contract\AbstractCommand{

	public function execute(Input $in, Output $out){

		$roleName = trim($in->getInput("Add Role:"));

		$again = true;

		while($again){

			$permName = trim($in->getInput("Add Permission:"));

			if(empty(trim($permName)))
				$again = false;
			
			$permNames[] = $permName;	
		}

		$role = $this->get("au.ctr.Role")->findByName($roleName);

		if(empty($role))
			throw new \Exception(sprintf("Could not find role[%s]", $roleName));

		$roleId = $role->getId();

		foreach($permNames as $permName){

			if(!empty($permName)){

				$perm = $this->get("au.ctr.Permission")->findByName($permName);

				$permId = $perm->getId();

				if(!$this->get("au.ctr.Role")->addPermission($roleId, $permId))
					throw new \Exception(sprintf("Controller\Role::addPermission failed at Permission [%s] Role [%s]!", $permName, $roleName));
			}
		}

		$out->add("Successfully added Permission(s) to Role.");
	}
}