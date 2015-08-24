<?php

require_once PATH.'/application/View.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
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
    
    public function uploadAction() {
        $this->_view = new View('upload');
        $this->_view->assign('target',BASE_URL.'/verify');
    }
    
	public function editorAction() {
		$this->_view = new View('editor');
	}
	
    public function verifyAction() {
        if (isset($_POST['type']) && isset($_FILES['uploaded']['tmp_name'])) {
            session_start();
            $json = file_get_contents($_FILES['uploaded']['tmp_name']);
            if ($_POST['type'] === 'properties') {
                $json = explode('"itemSets":',$json);
                $json = explode('KEY_BINDINGS',$json[1]);
                $json = substr('{"itemSets":'.$json[0],0,strlen('{"itemSets":'.$json[0])-14);
            }
            $values = json_decode($json, true);
            $_SESSION['set'] = $values;
            header('Location: '.BASE_URL);
            exit();
        }
        header('Location: '.BASE_URL);
        exit();
    }

}
