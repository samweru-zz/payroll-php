<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Relief20180626163316{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$rates = array(

			array(
		        "id"=>"1",
		        "name"=>"Personal Relief",
		        "monthly"=>"1162.00",
		        "annual"=>"13944.00",
		        "active"=>"1"
		    ),
		    array(
		        "id"=>"2",
		        "name"=>"Insurance Relief",
		        "monthly"=>"5000.00",
		        "annual"=>"60000.00",
		        "active"=>"0"
		    ),
		    array(
		        "id"=>"3",
		        "name"=>"Allowable Pension Fund Contribution",
		        "monthly"=>"20000.00",
		        "annual"=>"240000.00",
		        "active"=>"0"
		    ),
		    array(
		        "id"=>"4",
		        "name"=>"Allowable HOSP Contribution",
		        "monthly"=>"4000.00",
		        "annual"=>"48000.00",
		        "active"=>"0"
		    ),
		    array(
		        "id"=>"5",
		        "name"=>"Owner Occupier Interest",
		        "monthly"=>"12500.00",
		        "annual"=>"150000.00",
		        "active"=>"0"
		    )
		);

		foreach($rates as $rate)
			$conn->insert("relief", $rate);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM relief");
	}
}