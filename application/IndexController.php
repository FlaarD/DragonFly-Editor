<?php

require_once PATH.'/application/Controller.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
 * Mother-Class ?
 */
class IndexController extends Controller {
    
    public function indexAction() {
        $this->_view = new View('index');
    }
    
    public function testAction() {
        $this->_view = new View('index');
        $this->_view->assign('person', 'Fly');
    }
    
	public function editorAction() {
		$this->_view = new View('editor');
	}

}
