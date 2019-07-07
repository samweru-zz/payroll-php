<?php

namespace Payroll\HumanResourceModule\Router;

class Post extends \Strukt\Contract\Router{

  /**
  * @Route(/post/list)
  * @Method(GET)
  */
  public function listAll(){

    $posts = $this->get("hr.ctr.Post")->ls();    

    return self::json($posts);
  }

  /**
  * @Route(/post/all)
  * @Method(POST)
  */
  public function findAll(){

    $posts = $this->get("hr.ctr.Post")->all();

    // return self::json(array("page"=>1,
    //                     "rows"=>$lsPosts,
    //                     "total"=>count($lsPosts)));

    return self::json($posts);
  }

  /**
  * @Route(/post/{id:int})
  * @Method(GET)
  */
  public function find($id){

    $post = $this->get("hr.ctr.Post")->find($id);
    $depts = $this->get("hr.ctr.Dept")->ls();

    return self::json(array(

        "posts"=>$post->toArray(),
        "depts"=>$depts
    ));
  }

}
