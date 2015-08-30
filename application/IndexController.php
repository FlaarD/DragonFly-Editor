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
    }

}
