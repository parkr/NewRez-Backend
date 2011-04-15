<?php
class ResidentsController extends AppController {

	var $name = 'Residents';

	function index() {
		$this->Resident->recursive = 0;
		$this->set('residents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resident', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resident', $this->Resident->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Resident->create();
			if ($this->Resident->save($this->data)) {
				$this->Session->setFlash(__('The resident has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resident could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resident', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Resident->save($this->data)) {
				$this->Session->setFlash(__('The resident has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resident could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Resident->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resident', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Resident->delete($id)) {
			$this->Session->setFlash(__('Resident deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resident was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>