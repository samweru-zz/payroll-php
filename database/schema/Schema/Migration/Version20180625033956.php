<?php

namespace Schema\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180625033956 extends AbstractMigration{

	/**
	* @param Schema $schema
	*/
	public function up(Schema $schema){

		if($schema->hasTable("benefit"))
            $schema->dropTable("benefit");

        $benefit = $schema->createTable('benefit');
        $benefit->addColumn('id', 'integer', array('autoincrement' => true));
        $benefit->addColumn('name', 'string');
        $benefit->addColumn('descr', 'string');
        $benefit->addColumn('amount', 'string');
        $benefit->addColumn('perc', 'boolean');
        $benefit->addColumn('deduct', 'boolean');
        $benefit->addColumn('taxable', 'boolean');
        $benefit->addColumn('active', 'boolean', array("default"=>1));
        $benefit->setPrimaryKey(array('id'));
	}

	/**
	* @param Schema $schema
	*/
	public function down(Schema $schema){

		$schema->dropTable("benefit");
	}
}