<?php

namespace Payroll\AuthModule\Form;

class Role extends \Strukt\Contract\Form{

	protected function validation(){

		$service = $this->getValidatorService();

		$this->setMessage("name", $service->getNew($this->getParam("name"))->isNotEmpty();
		$this->setMessage("descr", $service->getNew($this->getParam("descr"))->isNotEmpty();
	}
}