<?php

use Strukt\User; 
use App\Service\Logger\Monologer;
use Strukt\Http\Session;
use Strukt\Env;
use Strukt\Framework\App;

return array(

	"map"=>array(

		"author"=>"app.dep.author",
		"authentic"=>"app.dep.authentic",
		"session"=>"app.dep.session",
		"logger"=>"app.dep.logger.sqllogger"
	),
	"events"=>array(

		"base"=>array(

			"author"=>function(){

				return array(

					"permissions" => array(

						/** "show_secrets"**/
						/** "user_all"**/
					)
				);
			},
			"authentic"=>function(Session $session){

				$user = new Strukt\User();
				$user->setUsername($session->get("username"));

				return $user;
			},
			"session"=>function(){

				return new Session;
			}
		),
		"pkg_do"=>array(

			"logger"=>function(){

				$log_dir = sprintf("%s/logs/", Env::get("root_dir"));

				return new Monologer(null, null, $log_dir);
			}
		),
		"pkg_roles"=>array(

			"author"=>function(Session $session){

				if($session->has("username")){

					$userC = App::newCls("{{app}}\AuthModule\Controller\User");
					$permissions = $userC->findPermissionsByUsername($session->get("username"));

					return $permissions;
				}

				return array();
			}
		)
	)
);