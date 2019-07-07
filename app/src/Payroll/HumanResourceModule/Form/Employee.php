<?php

namespace Payroll\HumanResourceModule\Form;

class Employee extends \Strukt\Contract\Form{

	protected function validation(){

		$service = $this->getValidatorService();
		$this->setMessage("surname", $service->getNew($this->get("surname"))->isAlpha());
		$this->setMessage("othernames", $service->getNew($this->get("othernames"))->isAlpha());
		$this->setMessage("post", $service->getNew($this->get("post"))->isNumeric());
		$this->setMessage("addr1", $service->getNew($this->get("addr1"))->isNotEmpty());
		$this->setMessage("phone1", $service->getNew($this->get("phone1"))->isNotEmpty());
		$this->setMessage("email1", $service->getNew($this->get("email1"))->isEmail());
		$this->setMessage("nssf", $service->getNew($this->get("nssf"))->isAlphaNum());
		$this->setMessage("nhif", $service->getNew($this->get("nhif"))->isAlphaNum());
		$this->setMessage("pin", $service->getNew($this->get("pin"))->isAlphaNum());
		$this->setMessage("gender", $service->getNew($this->get("gender"))->isIn(array("M","F")));

		list($dob, $other) = explode("T", $this->get("dob"));		
		$this->setMessage("dob", $service->getNew($dob)->isDate());

		list($start, $other) = explode("T", $this->get("start"));		
		$this->setMessage("start", $service->getNew($start)->isDate());

		list($end, $other) = explode("T", $this->get("end"));		
		$this->setMessage("end", $service->getNew($end)->isDate());
		$this->setMessage("status", $service->getNew($this->get("status"))->isIn(array(
		
			"single","married","divorced"
		)));

		$this->setMessage("bankacc", $service->getNew($this->get("bankacc"))->isNotEmpty());
	}
}