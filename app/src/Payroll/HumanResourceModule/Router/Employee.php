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

    $filter = array(

      "name"=>$req->query->get("name")
    );

    $page = $req->query->get("page");
    $rows = $req->query->get("rows");

    list($page, $pages, $rows, $no_items, $items) = $this->get("hr.ctr.Employee")
                                                            ->pager($filter, $page, $rows);

    return self::json(array("page"=>$page,
                              "rows"=>$items,
                              "total"=>$rows));
  }

  /**
  * @Route(/employee/{id:int})
  * @Method(POST)
  */
  public function findOne($id){

    $employee = EmployeeC::getById($id);

    $employee = self::get("normalizer")->apply($employee)->exec();

     // $employee = EmployeeT::fromEntity();
     // $employee["posts"] = PostC::ls();

     return self::json($employee);
  }
}