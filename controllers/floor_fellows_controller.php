<?php
class FloorFellowsController extends AppController {

	var $name = 'FloorFellows';

	function index() {
		$this->FloorFellow->recursive = 0;
		$this->set('floorFellows', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid floor fellow', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('floorFellow', $this->FloorFellow->read(null, $id));
	}

	/*function add() {
		if (!empty($this->data)) {
			$this->FloorFellow->create();
			if ($this->FloorFellow->save($this->data)) {
				$this->Session->setFlash(__('The floor fellow has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The floor fellow could not be saved. Please, try again.', true));
			}
		}
	}*/

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid floor fellow', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			move_uploaded_file($this->data["FloorFellow"]["image_name"]["tmp_name"], "/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/ffs/" . $this->data["FloorFellow"]["image_name"]["name"]);
			$this->data["FloorFellow"]["image_name"] = $this->data["FloorFellow"]["image_name"]["name"];
			$this->_createMiniImage("/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/ffs/", $this->data["FloorFellow"]["image_name"]);
			if ($this->FloorFellow->save($this->data)) {
				$this->Session->setFlash(__('The floor fellow has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The floor fellow could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FloorFellow->read(null, $id);
		}
	}
	
	function edit_mini($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid floor fellow', true));
			$this->redirect(array('action' => 'index'));
		}
		$data = $this->FloorFellow->read(null, $id);
		$data["FloorFellow"]["mini_image_name"] = $this->FloorFellow->getMiniName($data["FloorFellow"]["image_name"]);
		$this->set('floorFellow', $data);
	}
	
	function steal_mini(){
		$id = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "id:")+3, 2);
		if(strpos($id, "/")){
			$id = substr($id, 0, 1);
		}
		$image = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "feather"));
		$id = (int)$id;
		$this->FloorFellow->id = $id;
		$stuff = $this->FloorFellow->read(null, $id);
		$image_name = "ffs/".$this->FloorFellow->getMiniName($stuff["FloorFellow"]["image_name"]);
		$dest = "/home/parkrm04/public_html/newrez.ca/wordpress/wp-content/uploads/ffs/".$this->FloorFellow->getMiniName($stuff["FloorFellow"]["image_name"]);
		$img = imagecreatefrompng('http://'.$image);
		$width = imagesx( $img );
	    $height = imagesy( $img );
		$tmp_img = imagecreatetruecolor( $width, $height );
		imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $width, $height, $width, $height );
		imagejpeg($tmp_img, $dest);
		$this->Session->setFlash(__('Mini Photo Updated', true));
		$this->redirect(array('action' => 'index'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for floor fellow', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FloorFellow->delete($id)) {
			$this->Session->setFlash(__('Floor fellow deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Floor fellow was not deleted', true));
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
		  $new_name_parts = explode('.', $image);
		  $new_name = "";
		  for($i=0; $i<count($new_name_parts)-1; $i++){
			  $new_name .= $new_name_parts[$i];
		  }
		  $new_name .= "_mini.jpg";
		
	      // save thumbnail into a file
	      imagejpeg( $tmp_img, "{$path}{$new_name}" );
		  return $new_name;
	    }
	}
}
?>