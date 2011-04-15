<?php
class FacilitiesController extends AppController {

	var $name = 'Facilities';

	function index() {
		$this->Facility->recursive = 0;
		$this->set('facilities', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid facility', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('facility', $this->Facility->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Facility->create();
			if ($this->Facility->save($this->data)) {
				$this->Session->setFlash(__('The facility has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid facility', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Facility->save($this->data)) {
				$this->Session->setFlash(__('The facility has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facility could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Facility->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for facility', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Facility->delete($id)) {
			$this->Session->setFlash(__('Facility deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Facility was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>