<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Nhif20180626213259{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$rates = array(
		    array(
		        "id"=> "1",
		        "lbound"=> "0.00",
		        "ubound"=> "5999.00",
		        "amount"=> "150.00"
		    ),
		    array(
		        "id"=> "2",
		        "lbound"=> "6001.00",
		        "ubound"=> "7999.00",
		        "amount"=> "300.00"
		    ),
		    array(
		        "id"=> "3",
		        "lbound"=> "8000.00",
		        "ubound"=> "22222.00",
		        "amount"=> "400.00"
		    ),
		    array(
		        "id"=> "4",
		        "lbound"=> "12000.00",
		        "ubound"=> "14999.00",
		        "amount"=> "500.00"
		    ),
		    array(
		        "id"=> "5",
		        "lbound"=> "15000.00",
		        "ubound"=> "22222.00",
		        "amount"=> "600.00"
		    ),
		    array(
		        "id"=> "6",
		        "lbound"=> "20000.00",
		        "ubound"=> "24999.00",
		        "amount"=> "750.00"
		    ),
		    array(
		        "id"=> "7",
		        "lbound"=> "25000.00",
		        "ubound"=> "29999.00",
		        "amount"=> "850.00"
		    ),
		    array(
		        "id"=> "8",
		        "lbound"=> "30000.00",
		        "ubound"=> "49999.00",
		        "amount"=> "1000.00"
		    ),
		    array(
		        "id"=> "9",
		        "lbound"=> "50000.00",
		        "ubound"=> "99999.00",
		        "amount"=> "1500.00"
		    ),
		    array(
		        "id"=> "10",
		        "lbound"=> "100000.00",
		        "ubound"=> "99999999.99",
		        "amount"=> "2000.00"
		   )
		);

		foreach($rates as $rate)
			$conn->insert("nhif", $rate);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM nhif;");
	}
}