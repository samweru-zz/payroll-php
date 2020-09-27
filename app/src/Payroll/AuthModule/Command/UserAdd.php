<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;

/**
* user:add     Create User
*/
class UserAdd extends \App\Contract\AbstractCommand{

	public function execute(Input $in, Output $out){

		$username = trim($in->getInput("Username:"));
                $password = $in->getMaskedInput("Password:");
                $role_name = $in->getInput("Role:");

                $role = $this->get("au.ctr.Role")->findByName($role_name);

                if(empty($role))
                	throw new \Exception(sprintf("Failed to find role[%s]!", $role_name));

                if(is_null($this->get("au.ctr.User")->add(array(

                	"username"=>$username,
                	"password"=>$password,
                	"role_id" => $role->getId()
                ))))
        	       throw new \Exception("Failed to add [User]!");

		$out->add("Successfully added [User].");
	}
}