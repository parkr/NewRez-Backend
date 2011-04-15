<?php
class CouncillorsController extends AppController {

	var $name = 'Councillors';

	function index() {
		$this->Councillor->recursive = 0;
		$this->set('councillors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid councillor', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('councillor', $this->Councillor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Councillor->create();
			if ($this->Councillor->save($this->data)) {
				$this->Session->setFlash(__('The councillor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The councillor could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid councillor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Councillor->save($this->data)) {
				$this->Session->setFlash(__('The councillor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The councillor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Councillor->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for councillor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Councillor->delete($id)) {
			$this->Session->setFlash(__('Councillor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Councillor was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>