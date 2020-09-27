<?php

namespace Payroll\AuthModule\Form;

class Permission extends \Strukt\Contract\Form{
	
	protected function validation(){

		$service = $this->getValidatorService();

		$this->setMessage("name", $service->getNew($this->get("name"))->isNotEmpty());
	}
}