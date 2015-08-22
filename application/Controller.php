<?php

require_once PATH.'/application/View.php';
/**
 * Controller class
 * Mother-Class ?
 */
class Controller {
    
    private $_view;
    
    public function indexAction() {
        $this->_view = new View('index');
    }
    
    public function testAction() {
        $this->_view = new View('index');
        $this->_view->assign('person', 'Fly');
    }

}
