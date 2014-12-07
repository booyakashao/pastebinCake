<?php

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');

	public function index() {
		/*This is removed because the database does not have posts table
		
		$this->set('posts', $this->Post->find('all'));
		*/
	}

	public function view($id = null) {
        	if (!$id) {
            		throw new NotFoundException(__('Invalid post'));
        	}

        	$post = $this->Post->findById($id);
        	if (!$post) {
            		throw new NotFoundException(__('Invalid post'));
        	}
        	$this->set('post', $post);
   	 }
}
