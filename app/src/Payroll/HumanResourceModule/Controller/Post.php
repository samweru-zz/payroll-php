<?php

namespace Payroll\HumanResourceModule\Controller;

class Post extends \Strukt\Contract\Controller{

	public function ls(){

	    $query = $this->da()->query("SELECT p.id, p.name FROM ~Post p");

	    $posts = $query->getResult();

	    return $posts;
	}

	public function all(){

	    $posts = $this->da()->repo("Post")->findAll();

	    return $posts;
	}

	public function getById($id){

		$post = $this->da()->find("Post", $id);
		
    	return $post;
	}
}
