<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Dept20180702153934{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$depts = array(
		    array(
		        "id"=> 1,
		        "name"=> "Information Technology",
		        "descr"=> "N/A",
		   	),
		   	array(
		        "id"=> 2,
		        "name"=> "Human Resource",
		        "descr"=> "N/A",
		   	),
		   	array(
		        "id"=> 3,
		        "name"=> "Accounting",
		        "descr"=> "N/A",
		   	)
		);

		foreach($depts as $dept)
			$conn->insert("department", $dept);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM department;");
	}
}