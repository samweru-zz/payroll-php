<?php

namespace Schema\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180625022958 extends AbstractMigration{

	/**
	* @param Schema $schema
	*/
	public function up(Schema $schema){

		if($schema->hasTable("department"))
            $schema->dropTable("department");

        $dept = $schema->createTable('department');
        $dept->addColumn('id', 'integer', array('autoincrement' => true));
        $dept->addColumn('name', 'string');
        $dept->addColumn('descr', 'string', array("notnull"=>false));
        $dept->setPrimaryKey(array('id'));

        if($schema->hasTable("post"))
            $schema->dropTable("post");

        $post = $schema->createTable('post');
        $post->addColumn('id', 'integer', array('autoincrement' => true));
        $post->addColumn('name', 'string');
        $post->addColumn('descr', 'string', array("notnull"=>false));
        $post->addColumn('department_id', 'integer');
        $post->setPrimaryKey(array('id'));

        $post->addForeignKeyConstraint($dept, array("department_id"), array("id"), array(

            "onUpdate" => "CASCADE"
        ));

        if($schema->hasTable("employee"))
            $schema->dropTable("employee");

        $employee = $schema->createTable('employee');
        $employee->addColumn('id', 'integer', array('autoincrement' => true));
        $employee->addColumn('idno', 'integer');
        $employee->addColumn('surname', 'string');
        $employee->addColumn('othernames', 'string');
        $employee->addColumn('post_id', 'integer');
        $employee->addColumn('address', 'text');
        $employee->addColumn('other_address', 'text', array("notnull"=>false));
        $employee->addColumn('phone', 'text');
        $employee->addColumn('other_phone', 'text', array("notnull"=>false));
        $employee->addColumn('email', 'string');
        $employee->addColumn('other_email', 'string', array("notnull"=>false));
        $employee->addColumn('nssf', 'string');
        $employee->addColumn('nhif', 'string');
        $employee->addColumn('pin', 'string');
        $employee->addColumn('gender', 'string');
        $employee->addColumn('country', 'string');
        $employee->addColumn('city', 'string');
        $employee->addColumn('dob', 'date');
        $employee->addColumn('start_date', 'date');
        $employee->addColumn('end_date', 'date');
        $employee->addColumn('bank', 'text');
        $employee->addColumn('active', 'boolean', array("notnull"=>false, "default"=>1));
        $employee->setPrimaryKey(array('id'));

        $employee->addForeignKeyConstraint($post, array("post_id"), array("id"), array(

            "onUpdate" => "CASCADE"
        ));
	}

	/**
	* @param Schema $schema
	*/
	public function down(Schema $schema){

		$schema->dropTable("employee");
		$schema->dropTable("post");
		$schema->dropTable("department");
	}
}