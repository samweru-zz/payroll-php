<?php

namespace Payroll\AuthModule\Controller;

class Permission extends \Strukt\Contract\Controller{

	public function findByName($name){		

		$permission = $this->da()->repo("Permission")->findOneBy(array(

			"name"=>$name
		));

	   	return $permission;
	}

	public function find($id){

		$permission = $this->da()->find("Permission", $id);

		return $permission;
	}

	public function findRolesByPermission($permName){

		$dql = "SELECT r.id as role_id, p.id as perm_id,
						r.name as role_name, p.name as perm_name
					 FROM ~RolePermission rp
						LEFT JOIN rp.permission p
						LEFT JOIN rp.role r
					WHERE p.name = :permName";

		return $this->da()
			->query($dql)
			->setParameters(array(

				"permName"=>$permName
			))
			->getResult();
	}

	public function pager(Array $filter = [], $start_from, $page_size){

		$qb = $this->da()->repo("Permission")->createQueryBuilder("p");

		$qb->addSelect("p.id, p.name");

		if(array_key_exists("name", $filter)){

			$qb->orWhere("p.name LIKE :name");

			$qb->setParameter("name", '%'.$filter["name"].'%');
		}

		$qb->orderBy("p.id", "ASC");

		$pager = $this->da()->paginate($qb, $start_from, $page_size);

		return $pager;
	}

	public function add(Array $perm_data){

		extract($perm_data);

		$permission = $this->get("Permission");

		try{

			$permission->setName($name);
			$permission->setDescr($descr);
			$permission->save();

			return $permission;
		}
		catch(\Exception $e){

			$this->core()->get("app.logger")->error($e->getMessage());

			return null;
		}
	}

	public function update($id, Array $perm_data){

		extract($perm_data);

		$permission = $this->find($id);

		try{

			$permission->setName($name);
			$permission->setDescr($descr);
			$permission->save();

			return true;
		}
		catch(\Exception $e){

			$this->core()->get("app.logger")->error($e->getMessage());

			return false;
		}
	}
}