<?php

namespace Payroll\AuthModule\Router;

use Strukt\Http\Request;

class Permission extends \Strukt\Contract\Router{

	/**
	* @Route(/permission/{id:int})
	* @Method(POST)
	*/
	public function find($id, Request $request){

		$permission = $this->get("au.ctr.Permission")->find($id);

		return $permission->toArray();
	}

	/**
	* @Route(/permission/all)
	* @Permission(perm_add)
	* @Method(POST)
	*/
	public function all(Request $request){

		$filter = [];

		$start_at = $request->get("start_at");
		$page_size = $request->get("page_size");

		$name = $request->get("name");
		if(!empty($name))
			$filter["name"] = $name;

		$pager = $this->get("au.ctr.Permission")->pager($filter, $start_at, $page_size);

		return self::json($pager);
	}

	/**
	* @Route(/permission/add)
	* @Method(POST)
	*/
	public function add(Request $request){

		$name = $request->get("name");
		$descr = $request->get("descr");

		$permFrm = $this->get("au.frm.Permission", [$request]);
		$messages = $permFrm->validate();

		if($messages["is_valid"]){

			$permission = $this->get("au.ctr.Permission")->add(array(

				"name"=>$name,
				"descr"=>$descr
			));

			if(!is_null($permission)){

				return $this->json(array(

					"success"=>true,
					"message"=>"Permission successfuly saved."
				));
			}
			
			return $this->json(array(

				"success"=>false,
				"message"=>"Failed to save permission!"
			));
		}
		
		return $this->json(array(

	        "success"=>false,
	        "message"=>"Invalid input!",
	        "validation"=>$messages
	    ));
	}

	/**
	* @Route(/permission/update)
	* @Method(POST)
	*/
	public function update(Request $request){

		$id = $request->get("id");
		$name = $request->get("name");
		$descr = $request->get("descr");

		$permFrm = $this->get("au.frm.Permission", [$request]);
		$messages = $permFrm->validate();

		$permC = $this->get("au.ctr.Permission");

		if($messages["is_valid"]){

			$success = $permC->update($id, array(

				"name"=>$name,
				"descr"=>$descr
			));

			if($success){

				return $this->json(array(

					"success"=>true,
					"message"=>"Permission successfully updated."
				));
			}
		
			return $this->json(array(

				"success"=>false,
				"message"=>"Failed to update permission!"
			));
		}
		
		return $this->json(array(

	        "success"=>false,
	        "message"=>"Invalid input!",
	        "validation"=>$messages
	    ));
	}
}