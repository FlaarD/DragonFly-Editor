<?php

require_once PATH.'/application/Controller.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
 * Mother-Class ?
 */
class IndexController extends Controller {
    
    public function blankAction() {
        $this->_view->setTitle('DragonFly Editor - THE Blank Page');
        $this->_view->setDescription ('WOW, so much blank !');
    }
    
    public function indexAction() {
        $this->_view->setTitle('DragonFly Editor');
        $this->_view->setDescription('DragonFly Editor, the main page !');
        $this->_view->addCss('/css/index.css');
    }
    
	public function editorAction() {
        $this->_view->setTitle('DragonFly Editor');
        $this->_view->setDescription('DragonFly Editor, the editor page !');
        $this->_view->addCss('/css/editor.css');
		$this->_view->addJs('/js/editor.js');
	}
    
    public function selectorAction() {
        $this->_view->setTitle('DragonFly Editor - Selector');
        $this->_view->setDescription('DragonFly Editor, selector for the item sets');
        if (isset($_SESSION['set']['itemSets'])) {
            $this->_view->assign('itemSets', $_SESSION['set']['itemSets']);
        }
        if (isset($this->_params['error'])) {
            $this->_view->assign('error', $this->_params['error']);
        }
    }
    
    public function selectorValidAction() {
        if (isset($_POST['setName'])) {
            $_SESSION['choseSet'] = $_POST['setName'];
            header('Location: '.BASE_URL.'index');
        } else {
            header('Location: '.BASE_URL.'index/selector/error/noParam');
        }
    }

}
