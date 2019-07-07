<?php

namespace Schema\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20180626025505 extends AbstractMigration{

	/**
	* @param Schema $schema
	*/
	public function up(Schema $schema){

		if($schema->hasTable("relief"))
            $schema->dropTable("relief");

        $relief = $schema->createTable('relief');
        $relief->addColumn('id', 'integer', array('autoincrement' => true));
        $relief->addColumn('name', 'string');
        $relief->addColumn('monthly', 'string');
        $relief->addColumn('annual', 'string');
        $relief->addColumn('active', 'boolean', array("default"=>1));
        $relief->setPrimaryKey(array('id'));

        if($schema->hasTable("paye"))
            $schema->dropTable("paye");

        $paye = $schema->createTable('paye');
        $paye->addColumn('id', 'integer', array('autoincrement' => true));
        $paye->addColumn('mlbound', 'string');
        $paye->addColumn('mubound', 'string');
        $paye->addColumn('albound', 'string');
        $paye->addColumn('aubound', 'string');
        $paye->addColumn('rate', 'string');
        $paye->setPrimaryKey(array('id'));

        if($schema->hasTable("nhif"))
            $schema->dropTable("nhif");

        $nhif = $schema->createTable('nhif');
        $nhif->addColumn('id', 'integer', array('autoincrement' => true));
        $nhif->addColumn('lbound', 'string');
        $nhif->addColumn('ubound', 'string');
        $nhif->addColumn('amount', 'string');
        $nhif->setPrimaryKey(array('id'));
	}

	/**
	* @param Schema $schema
	*/
	public function down(Schema $schema){

        $schema->dropTable("nhif");
        $schema->dropTable("paye");
        $schema->dropTable("relief");
	}
}