<?php

namespace Payroll\AuthModule\Form;

class ChangePassword extends \Strukt\Contract\Form{

	
	protected function validation(){

		$service = $this->getValidatorService();

		$this->setMessage("password", $service->getNew($this->get("password"))
							->isNotEmpty());

		$this->setMessage("confirm", $service->getNew($this->get("confirm"))
							->isNotEmpty());

		$this->setMessage("password_match", $service->getNew($this->get("password"))
							->isNotEmpty()
							->equalTo($this->get("confirm")));

		$this->setMessage("role", $service->getNew($this->get("role"))
							->isNumeric());
	}
}