<?php

App::uses('Utilities', 'Lib');

class PastebinentriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Paginator');
	public $paginate = array(
		'fields' => array('Pastebinentry.id', 'Pastebinentry.URL', 'Pastebinentry.CONTENT'),
		'limit' => 50,
		'order' => array('Pastebinentry.id' => 'desc')
	);
        
        public function beforeFilter(Event $event)
        {
            parent::beforeFilter($event);
            $this->set('userRole', $this->Auth->user('role'));
        }

	public function index() {
		$this->set('title_for_layout', 'Pastebin Entries');
		$this->Paginator->settings = $this->paginate;
		$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

		$this->set('pasteBinEntries', $pastebinEntries);
	}

	public function search() {
		$this->set('title_for_layout', 'Pastebin Search');
		if ($this->request->is('post')) {
			$searchTerms = explode(',', $this->request->data['Pastebinentry']['searchTerm']);
			
			$searchTermArray = array('OR' => array());

			foreach($searchTerms as $searchTerm) {
				$searchTermArray['OR'][] = array('Pastebinentry.CONTENT LIKE' => "%$searchTerm%");
			}

			$paginateSettings = array(
				'conditions' => $searchTermArray,
				'fields' => array('Pastebinentry.id', 'Pastebinentry.URL', 'Pastebinentry.CONTENT'),
				'limit' => 50,
				'order' => array('Pastebinentry.id' => 'desc')
			);

			$this->Paginator->settings = $paginateSettings;
			$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

			$this->set('pasteBinEntries', $pastebinEntries);
                        $this->set('searchTerms', $this->request->data['Pastebinentry']['searchTerm']);
                        $this->Session->write('searchTermPersisted', $this->request->data['Pastebinentry']['searchTerm']);
		} else {
                    $paginateSettings = $this->paginate;
                        if($this->Session->check('searchTermPersisted')) {
                            $searchTerms = explode(',', $this->Session->read('searchTermPersisted'));
                            
                            $searchTermArray = array('OR' => array());

                            foreach($searchTerms as $searchTerm) {
				$searchTermArray['OR'][] = array('Pastebinentry.CONTENT LIKE' => "%$searchTerm%");
                            }

                            $paginateSettings = array(
				'conditions' => $searchTermArray,
				'fields' => array('Pastebinentry.id', 'Pastebinentry.URL', 'Pastebinentry.CONTENT'),
				'limit' => 50,
				'order' => array('Pastebinentry.id' => 'desc')
                            );
                        }
			$this->Paginator->settings = $paginateSettings;
			$pastebinEntries = $this->Paginator->paginate('Pastebinentry');

			$this->set('pasteBinEntries', $pastebinEntries);
		}
	}

	public function view($id = null) {
		$this->set('title_for_layout', 'View number '. $id);
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

