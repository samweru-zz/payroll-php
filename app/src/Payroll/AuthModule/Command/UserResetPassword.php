<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;

/**
* user:reset     Reset Password
*/
class UserResetPassword extends \App\Contract\AbstractCommand{

	public function execute(Input $in, Output $out){

		$username = trim($in->getInput("Username:"));
        $password = $in->getMaskedInput("Password:");

        if($this->get("au.ctr.User")->changePassword($username, $password))
        	$out->add("Changed password successfully.");
        else
        	$out->add("Failed to change password!");
	}
}