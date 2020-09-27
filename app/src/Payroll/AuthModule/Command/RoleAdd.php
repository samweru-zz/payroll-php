<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;

/**
* role:add   Create Role
*/
class RoleAdd extends \App\Contract\AbstractCommand{

	public function execute(Input $in, Output $out){

		$role_name = trim($in->getInput("Add Role:"));

		if(is_null($this->get("au.ctr.Role")->add(array(

			"name"=>$role_name, 
			"descr"=>"N/A"
		))))
			throw new \Exception(sprintf("Controller\Role::add failed to add [Role]!"));

		$out->add("Successfully added [Role].");
	}
}