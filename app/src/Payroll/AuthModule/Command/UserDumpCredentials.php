<?php

namespace Payroll\AuthModule\Command;

use Strukt\Console\Input;
use Strukt\Console\Output;
use Strukt\Fs;

/**
* user:dumpcred     Dump credentials in [user.json]
*/
class UserDumpCredentials extends \Strukt\Console\Command{

	public function execute(Input $in, Output $out){

		$username = trim($in->getInput("Username:"));
        $password = $in->getMaskedInput("Password:");

        try{

        	$credentials = json_encode(array(

	        	"username"=>$username,
	        	"password"=>sha1($password)

	        ), JSON_PRETTY_PRINT);

        	if(Fs::isFile("user.json"))
	        	Fs::overwrite("user.json", $credentials);
	        else
	        	Fs::touchWrite("user.json", $credentials);

	        $out->add("User added successfully.");
	    }
	    catch(\Exception $e){

	    	$out->add($e->getMessage());
	    }	
	}
}