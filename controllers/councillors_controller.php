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

	/*function add() {
		if (!empty($this->data)) {
			$this->Councillor->create();
			if ($this->Councillor->save($this->data)) {
				$this->Session->setFlash(__('The councillor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The councillor could not be saved. Please, try again.', true));
			}
		}
	}*/

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid councillor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if($this->data["Councillor"]["image"]["tmp_name"] != ""){
				move_uploaded_file($this->data["Councillor"]["image"]["tmp_name"], "/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/councillors/" . $this->data["Councillor"]["image"]["name"]);
				$this->data["Councillor"]["image_name"] = $this->data["Councillor"]["image"]["name"];
				$this->_createMiniImage("/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/councillors/", $this->data["Councillor"]["image_name"]);
			}
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
	
	function edit_mini($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid councillor', true));
			$this->redirect(array('action' => 'index'));
		}
		$data = $this->Councillor->read(null, $id);
		$data["Councillor"]["mini_image_name"] = $this->Councillor->getMiniName($data["Councillor"]["image_name"]);
		$this->set('councillor', $data);
	}
	
	function steal_mini(){
		$id = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "id:")+3, 2);
		if(strpos($id, "/")){
			$id = substr($id, 0, 1);
		}
		$image = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "feather"));
		$id = (int)$id;
		$this->Councillor->id = $id;
		$stuff = $this->Councillor->read(null, $id);
		$image_name = "councillors/".$this->Councillor->getMiniName($stuff["Councillor"]["image_name"]);
		$dest = "/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/councillors/".$this->Councillor->getMiniName($stuff["Councillor"]["image_name"]);
		$img = imagecreatefrompng('http://'.$image);
		$width = imagesx( $img );
	    $height = imagesy( $img );
		$tmp_img = imagecreatetruecolor( $width, $height );
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $width, $height, $width, $height );
		imagejpeg($tmp_img, $dest);
		$this->Session->setFlash(__('Mini photo updated', true));
		$this->redirect(array('action' => 'index'));
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
	
	function _createMiniImage( $path, $image ) 
	{
	    // parse path for the extension
	    $info = pathinfo($path . $image);
	    // continue only if this is a JPEG image
	    if ( strtolower($info['extension']) == 'jpg' ){
	      // load image and get image size
	      $img = imagecreatefromjpeg( "{$path}{$image}" );
	      $width = imagesx( $img );
	      $height = imagesy( $img );

	      // calculate thumbnail size
	      //$new_width = $thumbWidth;
	      //$new_height = floor( $height * ( $thumbWidth / $width ) );

	      // create a new temporary image
	      $tmp_img = imagecreatetruecolor( $width, $height );

	      // copy and resize old image into new image 
	      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $width, $height, $width, $height );

		  // create new image name - it's a copy after all
		  $new_name = $this->Councillor->getMiniName($image);
		
	      // save thumbnail into a file
	      imagejpeg( $tmp_img, "{$path}{$new_name}" );
		  return $new_name;
	    }
	}
}
?>