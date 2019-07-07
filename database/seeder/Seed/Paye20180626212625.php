<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Paye20180626212625{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$rates = array(
		    array(
		        "id"=> "1",
		        "mlbound"=> "0.00",
		        "mubound"=> "10164.00",
		        "albound"=> "0.00",
		        "aubound"=> "121968.00",
		        "rate"=> "10"
		    ),
		    array(
		        "id"=> "2",
		        "mlbound"=> "10165.00",
		        "mubound"=> "19740.00",
		        "albound"=> "121969.00",
		        "aubound"=> "236880.00",
		        "rate"=> "15"
		    ),
		    array(
		        "id"=> "3",
		        "mlbound"=> "19741.00",
		        "mubound"=> "29316.00",
		        "albound"=> "236881.00",
		        "aubound"=> "351792.00",
		        "rate"=> "20"
		    ),
		    array(
		        "id"=> "4",
		        "mlbound"=> "29317.00",
		        "mubound"=> "38892.00",
		        "albound"=> "351793.00",
		        "aubound"=> "466704.00",
		        "rate"=> "25"
		    ),
		    array(
		        "id"=> "5",
		        "mlbound"=> "38892.00",
		        "mubound"=> "10000000.00",
		        "albound"=> "466704.00",
		        "aubound"=> "10000000.00",
		        "rate"=> "30"
		   )
		);

		foreach($rates as $rate)
			$conn->insert("paye", $rate);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM paye;");
	}
}