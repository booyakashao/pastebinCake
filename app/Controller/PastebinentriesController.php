<?php

class PastebinentriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');
	public $paginate = array(
		'fields' => array('Pastebinentry.id', 'Pastebinentry.URL'),
		'limit' => 50,
		'order' => array('Pastebinentry.id' => 'desc')
	);

	public function index() {
		$this->set('title', 'Pastebin Entries');
		$this->Paginator->settings = $this->paginate;
		$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

		$this->set('userRole', $this->Auth->user('role'));
		$this->set('pasteBinEntries', $pastebinEntries);
	}

	public function search() {
		$this->set('title', 'Pastebin Search');
		if ($this->request->is('post')) {
			$searchTerms = explode(',', $this->request->data['Pastebinentry']['searchTerm']);
			
			$searchTermArray = array('OR' => array());

			foreach($searchTerms as $searchTerm) {
				$searchTermArray['OR'][] = array('Pastebinentry.CONTENT LIKE' => "%$searchTerm%");
			}

			$paginateSettings = array(
				'conditions' => $searchTermArray,
				'fields' => array('Pastebinentry.id', 'Pastebinentry.URL'),
				'limit' => 50,
				'order' => array('Pastebinentry.id' => 'desc')
			);

			$this->Paginator->settings = $paginateSettings;
			$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

			$this->set('pasteBinEntries', $pastebinEntries);
		} else {
			$this->Paginator->settings = $this->paginate;
			$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

			$this->set('pasteBinEntries', $pastebinEntries);
		}
	}

	public function view($id = null) {
		$this->set('title', 'View number '. $id);
		if (!$id) {
            		throw new NotFoundException(__('Invalid pastebin_id'));
        	}

		$pastebinPrev = $this->Pastebinentry->find('first',
			array(
			'conditions' => array('Pastebinentry.id <' => $id),
			'limit' => 1,
			'order' => array('Pastebinentry.id' => 'desc'))
		);

		$pastebinNext = $this->Pastebinentry->find('first', 
			array(
			'conditions' => array('Pastebinentry.id >' => $id),
			'limit' => 1)
		);

		$this->set('pastebinPrev', $pastebinPrev);
		$this->set('pastebinNext', $pastebinNext);
		
		$pastebinentry = $this->Pastebinentry->findById($id);

		if(!$pastebinentry) {
			throw new NotFoundException(_('Invalid post'));
		}
		$this->set('pastebinentry', $pastebinentry);
	}

	public function delete($id) {
		if ($this->request->is('get')) {
        		throw new MethodNotAllowedException();
    		}
		
		if($this->Pastebinentry->delete($id)) {
			$this->Session->setFlash(
				__('The pastebin with id: %s has been deleted.', h($id))			
			);
			return $this->redirect(array('action' => 'index'));
		}
	}
}

