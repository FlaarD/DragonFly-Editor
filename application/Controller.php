<?php

require_once PATH.'/application/View.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
 * Mother-Class
 */
class Controller {
    
    protected $_view;
    
    protected $_params;
    
    public function __construct($template, $controller, $params) {
        session_start();
        $this->_view = new View($template, $controller);
        $this->_params = $params;
    }
    
}
