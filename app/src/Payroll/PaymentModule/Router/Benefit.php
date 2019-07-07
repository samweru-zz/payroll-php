<?php

namespace Payroll\PaymentModule\Router;

use Payroll\PaymentModule\Controller\Benefit as BenefitC;
use Payroll\PaymentModule\Transformer\Benefit as BenefitT;

class Benefit extends \App\Data\Router{

	/**
	* @Route(/benefit/all)
	* @Method(POST)
	*/
	public function findAll(){

		$lsBenefit = BenefitT::rsToList(BenefitC::all());

     	return self::json(array("page"=>1,
                        	"rows"=>$lsBenefit,
                       		"total"=>count($lsBenefit)));
	}

	/**
	* @Route(/benefit/{id:int})
	* @Method(POST)
	*/
	public function findOne($id){

		$tBenefit = BenefitT::fromEntity(BenefitC::getById($id));

     	return self::json($tBenefit);
	}

}