<?php

require_once PATH.'/application/Controller.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
 * Mother-Class ?
 */
class IndexController extends Controller {
    
    public function blankAction() {
        $this->_view = new View('blank');
    }
    
    public function indexAction() {
        $this->_view = new View('index');
    }
    
	public function editorAction() {
		$this->_view = new View('editor');
	}

}
