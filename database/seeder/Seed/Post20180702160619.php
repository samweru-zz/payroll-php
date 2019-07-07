<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Post20180702160619{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$posts = array(
		    array(
		        "id"=> 1,
		        "name"=> "IT Manager",
		        "department_id"=>1,
		        "descr"=> "N/A",
		   	),
		   	array(
		        "id"=> 2,
		        "name"=> "HR Manager",
		        "department_id"=>2,
		        "descr"=> "N/A",
		   	),
		   	array(
		        "id"=> 3,
		        "name"=> "Accounting Manager",
		        "department_id"=>3,
		        "descr"=> "N/A",
		   	)
		);

		foreach($posts as $post)
			$conn->insert("post", $post);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM post;");
	}
}