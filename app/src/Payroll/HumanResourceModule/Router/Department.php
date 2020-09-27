<?php

namespace Payroll\HumanResourceModule\Router;

use Strukt\Http\Request;

class Department extends \Strukt\Contract\Router{

  /**
  * @Route(/dept/update)
  * @Method(POST)
  */
  public function update(Request $request){

    $frmDept = $this->get("hr.frm.Department", [$request]);
    $msgs = $frmDept->validate();

    return self::json($msgs);
  }

  /**
  * @Route(/dept/list)
  * @Method(GET)
  * @Permission(dept_list)
  */
  public function listAll(){

    $depts = $this->get("hr.ctr.Department")->ls();

    return self::json($depts);
  }

  /**
  * @Route(/dept/all)
  * @Method(POST)
  */
  public function findAll(){

    $depts = $this->get("hr.ctr.Department")->all();

    foreach($depts as $dept)
      $rsDepts[] = $dept->toArray();
     
     return self::json($rsDepts);
  }

  /**
  * @Route(/dept/{id:int})
  * @Method(GET)
  */
  public function findOne($id){

    $dept = $this->get("hr.ctr.Department")->find($id);

     return self::json($dept->toArray());
  }

}