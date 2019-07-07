<?php

namespace Payroll\AuthModule\Router;

use Strukt\Http\Request;

class User extends \Strukt\Contract\Router{

  /**
  * @Route(/user/change/pass)
  * @Method(POST)
  */
  public function update(Request $request){

    $changePass = $this->get("au.frm.ChangePassword", [$request]);
    $msgs = $changePass->validate();

    return self::json($msgs);
  }

  /**
  * @Route(/user/all)
  * @Method(POST)
  */
  public function findAll(){

    $users = $this->get("au.ctr.User")->findAll();

    // return self::json(array("page"=>1,
    //                           "rows"=>$userList,
    //                           "total"=>count($userList)));

    return self::json($users);
  }

  /**
  * @Route(/user/{id:int})
  * @Method(POST)
  */
  public function findOne($id){

    $user = $this->get("au.ctr.User")->find($id);

    return self::json($user->toArray());
  }

}