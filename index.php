<?php

require "bootstrap.php";
$settings = require "cfg/settings.php";
$inject = require "cfg/injectables.php";

use Strukt\Framework\Configuration;
use Strukt\Framework\Injectable;
use Strukt\Framework\App as FrameworkApp;
use Strukt\Router\Kernel;
use Strukt\Http\Request;
use Strukt\Env;

$packages = FrameworkApp::packages("published");

$config = new Configuration($settings, $packages);
$inj = new Injectable($packages, $inject["map"], $inject["events"]);

Env::set("root_dir", getcwd());
foreach($config->get("env") as $key=>$attr)
	Env::set($key, $attr);

$kernel = new Kernel(Request::createFromGlobals());

$kconfigs = $inj->getConfigs();
if(!empty($kconfigs))
	foreach($kconfigs as $id=>$kconfig)
		$kernel->inject($inj->getId($id), $kconfig);

$kernel->providers($config->get("providers"));
$kernel->middlewares($config->get("middlewares"));

$loader = new App\Loader($kernel);
$app = $loader->getApp(); 
$app->runDebug();