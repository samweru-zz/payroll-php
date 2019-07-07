<?php

namespace Seed;

use Doctrine\DBAL\Connection;

class Employee20180702161526{

	/**
	* @param Connection $conn
	*/
	public function up(Connection $conn){

		$faker = \Faker\Factory::create();

		$posts = $conn->fetchAll("select * from post");

		for($i=1;$i<=50;$i++){

			$faker->addProvider(new \Faker\Provider\en_AU\Address($faker));

			$gender = $faker->randomElement(array("Male", "Female"));
			$name = $faker->name($gender);

			$post = $faker->randomElement($posts);

			$employees[] = array("id"=>$i,
				"post_id"=>$post["id"],
				"idno"=>$faker->randomNumber(8),
				"surname"=>$faker->lastName,
				"othernames"=>$name,
				"address"=>$faker->address,
				"other_address"=>"",
				"phone"=>$faker->phoneNumber,
				"other_phone"=>"",
				"email"=>$faker->email,
				"other_email"=>"",
				"nssf"=>$faker->randomNumber(9),
				"nhif"=>$faker->randomNumber(7),
				"pin"=>strtoupper(substr($faker->shuffle("abcdefghijklmnopqrstuvwxyz1234567890"),0,9)),
				"gender"=>$gender,
				"country"=>$faker->country,
				"city"=>$faker->city,
				"dob"=>$faker->date("Y-m-d", date("Y-m-d", strtotime("now -20 year"))),
				"start_date"=>$faker->dateTimeBetween("-1 year", "now")->format("Y-m-d"),
				"end_date"=>$faker->dateTimeBetween("+2 year", "+5 year")->format("Y-m-d"),
				"bank"=>sprintf("%s Bank, %s", $faker->randomElement(array(

					"Barclays", "Equity", "Co-operative", "Stanbic"
				)), $faker->bankAccountNumber),
				"active"=>$faker->randomElement(array("0","1")));
		}

		foreach($employees as $employee)
			$conn->insert("employee", $employee);
	}

	/**
	* @param Connection $conn
	*/
	public function down(Connection $conn){

		$conn->exec("DELETE FROM employee;");
	}
}