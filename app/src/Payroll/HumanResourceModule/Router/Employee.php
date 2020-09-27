<?php

namespace Payroll\HumanResourceModule\Router;

use Strukt\Http\Request;

class Employee extends \Strukt\Contract\Router{

  /**
  * @Route(/employee/update)
  * @Method(POST)
  */
  public function update(Request $request){

    $frmEmp = $this->get("hr.frm.Employee", [$request]);

    $msgs = $frmEmp->validate();

    return self::json($msgs);
  }

  /**
  * @Route(/employee/all)
  * @Method(POST)
  */
  public function findAll(Request $req){

    $page = $req->query->get("page");
    $rows = $req->query->get("rows");
    $name = $req->query->get("name");

    $filter = [];
    if(!empty($name))
      $filter = array(

        "name"=>$name
      );

    $pager = $this->get("hr.ctr.Employee")->pager($filter, 1, 10);

    return self::json([

      "rows" => $pager["items"],
      "count" => $pager["rows"]
    ]);
  }

  /**
  * @Route(/employee/{id:int})
  * @Method(POST)
  */
  public function findOne($id){

    $employee = $this->get("hr.ctr.Employee")->getById($id);

    return self::json($employee->toArray());
  }
}