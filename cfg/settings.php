<?php

return array(

	"console"=>array(

		"base"=>array( 

			"env"=>array(

				"rel_appsrc_dir"=>"app/src/",
				"rel_tpl_dir"=>"tpl/sgf",
				"rel_apptpl_ini"=>"tpl/sgf/cfg/app.sgf",
				"rel_app_ini"=>"cfg/app.ini",
				"rel_mod_ini"=>"cfg/module.ini",
				"rel_tplapp_dir"=>"tpl/sgf/app/",
				"rel_tplappsrc_dir"=>"tpl/sgf/app/src/",
				"rel_tplauthmod_dir"=>"tpl/sgf/app/src/App/AuthModule/",
				"rel_app_lib"=>"lib/App",
				"rel_loader_sgf"=>"tpl/sgf/lib/App/Loader.sgf",
			),
			"providers"=>array(

				Strukt\Framework\Provider\Annotation::class,
				Strukt\Framework\Provider\Router::class
			),
			"middlewares"=>array(

				Strukt\Router\Middleware\Router::class
			)
		),
		"pkg_do"=>array(

			"providers"=>array(
 
				App\Provider\Logger::class,
				App\Provider\EntityManager::class,
				App\Provider\EntityManagerAdapter::class,
				App\Provider\Normalizer::class
			),
			"commands"=>array(

				App\Command\Doctrine\GenerateModels::class,
				App\Command\Doctrine\Migration\GenerateMigration::class,
				App\Command\Doctrine\Seeder\GenerateSeeder::class,
				App\Command\Doctrine\Migration\MigrateExec::class,
				App\Command\Doctrine\Seeder\SeederExec::class,
				App\Command\Doctrine\SqlExec::class,
				App\Command\PhpUnit::class
			),
			"env"=>array(

				"is_dev"=>true,
				"rel_db_ini"=>"cfg/db.ini",
				"migration_sgf"=>"tpl/sgf/database/schema/Schema/Migration/Version_.sgf",
				"migration_home"=>"database/schema/Schema/Migration",
				"migration_ns"=>Schema\Migration::class,
				"entity_ns"=>App\Contract\Entity::class,
				"seeder_sgf"=>"tpl/sgf/database/seeder/Seed/NameVer.sgf",
				"seeder_dir"=>"database/seeder/Seed",
				"seeder_home"=>"database/seeder",
				"logger_name"=>"Console Logger",
				"logger_file"=>"logs/console.log",
			)
		),
		"pkg_roles"=>array(

			"commands"=>array(

  				"{{app}}\AuthModule\Command\PermissionAdd",
				"{{app}}\AuthModule\Command\RoleAdd",
				"{{app}}\AuthModule\Command\RoleAddPermission",
				"{{app}}\AuthModule\Command\UserAdd",
				"{{app}}\AuthModule\Command\UserDumpCredentials",
				"{{app}}\AuthModule\Command\UserResetPassword",
			)
		),
		"pkg_books"=>array(

			"commands"=>array(

				"{{app}}\AccountsModule\Command\BooksShell"
			)
		)
	),
	"index"=>array(

		"base"=>array(

			"providers"=>array(

				Strukt\Framework\Provider\Validator::class,
				Strukt\Framework\Provider\Annotation::class,
				Strukt\Framework\Provider\Router::class,
			),
			"middlewares"=>array(

				Strukt\Router\Middleware\ExceptionHandler::class,
				Strukt\Router\Middleware\Session::class,
				Strukt\Router\Middleware\Authorization::class,
				Strukt\Router\Middleware\Authentication::class,
				Strukt\Router\Middleware\StaticFileFinder::class,
				Strukt\Router\Middleware\Router::class,
				// App\Middleware\Cors::class
			),
			"env"=>array(

				"rel_app_ini"=>"/cfg/app.ini",
				"rel_static_dir"=>"public/static",
				"rel_mod_ini"=>"/cfg/module.ini",
				"is_dev"=>true,
			)
		),
		"pkg_do"=>array(

			"providers"=>array(

				App\Provider\Logger::class,
				App\Provider\EntityManager::class,
				App\Provider\EntityManagerAdapter::class,
				App\Provider\Normalizer::class
			),
			"env"=>array(

				"rel_appsrc_dir"=>"app/src/",
				"rel_db_ini"=>"cfg/db.ini",
				"logger_name"=>"Strukt Logger",
				"logger_file"=>"logs/app.log"
			)
		),
		"pkg_audit"=>array(

			"middlewares"=>array(

				App\Middleware\Audit::class
			)
		)
	)
);