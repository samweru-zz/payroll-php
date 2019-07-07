<?php

namespace Payroll\AuthModule\Router;  

use Strukt\Http\Response;
use Strukt\Http\Request;

class Role extends \Strukt\Contract\Router{

  /**
  * @Route(/role/add)
  * @Method(POST)
  */
  public function add(Request $req){

    $name = $req->query->get("name");
    $descr = $req->query->get("descr");

    $formRole = $this->get("au.frm.Role", [$request]);
    $msgs = $formRole->validate();

    if($msgs["is_valid"]){

      $roleId = $this->get("au.ctr.Role")->add($name, $descr);

      if(is_int($roleId))
        $res = array(

          "success"=>true,
          "data"=>array(

            "role"=>$roleId
          )
        );
      else
        $res = array("success"=>false);
    }
    else $res = array(

      "success"=>false,
      "validation"=>$msgs
    );

    return self::json($res);
  }

  /**
  * @Route(/role/update)
  * @Method(POST)
  */
  public function update(Request $req){

    $id = $req->query->get("id");
    $name = $req->query->get("name");
    $descr = $req->query->get("descr");

    $formRole = $this->get("au.frm.Role", [$request]);
    $msgs = $formRole->validate();

    if($msgs["is_valid"]){

      if($this->get("au.ctr.Role")->update($id, $name, $descr)){

        return array(

          "success"=>true,
          "data"=>array(

            "role"=>$id
          )
        );
      }
      else return array(

        "success"=>false
      );
    }
    else return array(

      "success"=>false,
      "validation"=>$msgs
    );
  }

  /**
  * @Route(/role/list)
  * @Method(GET)
  */
  public function listAll(){

    $roles = $this->get("au.ctr.Role")->ls();

    return self::json($roles);
  }

  /**
  * @Route(/role/all)
  * @Method(POST)
  */
  public function findAll(Request $req){

    $page = $req->query->get("page");
    $rows = $req->query->get("rows");

    $roles = $this->get("au.ctr.Role")->all();

    return self::json($roles);
  }

  /**
  * @Route(/role/{id:int})
  * @Method(POST)
  */
  public function findOne($id){

    $role = $this->get("au.ctr.Role")->find($id);

     return self::json($role->toArray());
  }

}