<?php

namespace Payroll\AuthModule\Tests;

use Strukt\Core\Registry;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{

	
	public function setUp(){

		$this->core = Registry::getInstance()->get("core");
	}

	
	public function testDoAuthentication(){

		$username = "admin";
		$password = "p@55w0rd";

		$isSuccess = $this->core->get("au.ctr.User")->doAuthentication($username, $password);

		$this->assertTrue($isSuccess);
	}
}