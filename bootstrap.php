<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING);

$cfg_app = parse_ini_file("cfg/app.ini");

$loader = require "vendor/autoload.php";
$loader->add("App", __DIR__."/lib/");
$loader->add("Strukt", __DIR__."/src/");

//pkg_do
$loader->add("Seed", __DIR__."/database/seeder/");

if(!is_null($cfg_app))
	$loader->add($cfg_app["app-name"], __DIR__."/app/src/");
