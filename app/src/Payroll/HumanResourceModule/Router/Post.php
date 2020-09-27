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

    foreach($posts as $post)
      $rsPosts[] = $post->toArray();

    return self::json($rsPosts);
  }

  /**
  * @Route(/post/{id:int})
  * @Method(GET)
  */
  public function find($id){

    $post = $this->get("hr.ctr.Post")->getById($id);
    $depts = $this->get("hr.ctr.Department")->ls();

    return self::json(array(

        "posts"=>$post->toArray(),
        "depts"=>$depts
    ));
  }

}
