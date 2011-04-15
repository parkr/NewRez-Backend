<?php
class BiosController extends AppController {

	var $name = 'Bios';

	function index() {
		$this->Bio->recursive = 0;
		$this->set('bios', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid bio', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('bio', $this->Bio->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Bio->create();
			if ($this->Bio->save($this->data)) {
				$this->Session->setFlash(__('The bio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bio could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid bio', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Bio->save($this->data)) {
				$this->Session->setFlash(__('The bio has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Bio->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for bio', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Bio->delete($id)) {
			$this->Session->setFlash(__('Bio deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Bio was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>