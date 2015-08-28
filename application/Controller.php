<?php

require_once PATH.'/application/View.php';
/**
 * Controller class
 * Function format for index controller : [name]Action
 * Mother-Class
 */
class Controller {
    
    protected $_view;
    
    public function __construct($template, $controller) {
        $this->_view = new View($template, $controller);
    }
    
}
