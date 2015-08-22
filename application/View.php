<?php

/**
 * View Class
 * Make the link between the Controller and the display
 */
class View {
    
    //variables to be used in the templates
    private $_data = array();
    //template file
    private $_render = false;
    
    /**
     * Construction method
     * Basically just check if the template to be rendered exists
     * @param template name of the template to be rendered
     */
    public function __construct($template) {
        try {
            $file = PATH . '/templates/' . strtolower($template) . '.phtml';
            if (file_exists($file)) {
                $this->_render = $file;
            } else {
                throw new Exception('Template '.$template.' not found');
            }
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    
    /**
     * Assign a value to a variable in the data array
     * @param variable Name of the variable
     * @param value Value of the variable
     */
    public function assign($variable, $value) {
        $this->_data[$variable] = $value;
    }
    
    /**
     * Destruction method
     * When destroyed, render the template so that it can be viewed
     */
    public function __destruct() {
        //make the variables from data accessible for the template
        extract($this->_data);
        //render the template
        include($this->_render);
    }
}
