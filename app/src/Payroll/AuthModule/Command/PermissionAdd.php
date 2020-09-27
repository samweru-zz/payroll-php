<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;

/**
* perm:add     Create Permission
*/
class PermissionAdd extends \App\Contract\AbstractCommand{

	public function execute(Input $in, Output $out){

		$again = true;

		while($again){

			$perm = trim($in->getInput("Add Permission:"));

			if(empty(trim($perm)))
				$again = false;
			
			$perms[] = $perm;	
		}

		foreach($perms as $perm)
			if(!empty($perm))
				if(is_null($this->get("au.ctr.Permission")->add(array(

						"name"=>$perm, 
						"descr"=>"N/A"
					))))
					throw new \Exception(sprintf("Controller\Permission::add failed at [%s]!", $perm));

		$out->add("Successfully added Permission(s).");
	}
}