<?php

namespace Payroll\HumanResourceModule\Form;

class Department extends \Strukt\Contract\Form{

	protected function validation(){

		$service = $this->getValidatorService();

		$this->setMessage("name", $service->getNew($this->get("name"))->isNotEmpty());
	}
}