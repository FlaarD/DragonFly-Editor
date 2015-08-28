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
    //title
    private $_title = '';
    //description
    private $_description = '';
    //array of the JS files
    private $_js = array();
    //array of the CSS files
    private $_css = array();
    
    /**
     * Construction method
     * Basically just check if the template to be rendered exists
     * @param template name of the template to be rendered
     */
    public function __construct($template, $controller = '') {
        try {
            $file = PATH . '/templates/' . strtolower($controller). '/' . strtolower($template) . '.phtml';
            if (file_exists($file)) {
                $this->_render = $file;
            } else {
                throw new Exception('Template '.$template.' not found for controller ' . $controller);
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
        echo "
        <!DOCTYPE >
        <html>
            <head>
                ".($this->_title === '' ? '' : '<title>'.$this->_title.'</title>')."
                ".($this->_description === '' ? '' : '<meta name="description" content="'.$this->_description.'" />')."
                <script src='/js/jquery-2.1.4.min.js' type='text/javascript'></script>
                ".$this->_generateJS().$this->_generateCSS()."
            </head>
            <body>
        ";
        //render the template
        include($this->_render);
        echo "
            </body>
        </html>";
    }
    
    /**
     * Set the title for the page
     * $title string The title
     */
    public function setTitle($title) {
        $this->_title = $title;
    }
    
    /**
     * Set the description for the page
     * $description string The description
     */
    public function setDescription($description) {
        $this->_description = $description;
    }
    /**
     * Add a CSS file to the view
     * $path string path to the CSS file
     */
    public function addCss($path) {
        $this->_css[] = $path;
    }
    
    /**
     * Add a JS file to the view
     * $path string path to the JS file
     */
    public function addJs($path) {
        $this->_js[] = $path;
    }
    
    /**
     * Generate the html code to include JS files
     */
    private function _generateJS() {
        $html = '';
        foreach ($this->_js as $path) {
            $html .= "<script src='$path' type='text/javascript'></script>\n";
        }
        return $html;
    }
    
    /**
     * Generate the html code to include CSS files
     */
    private function _generateCSS() {
        $html = '';
        foreach ($this->_css as $path) {
            $html .= "<link rel='stylesheet' type='text/css' href='$path'/>\n";
        }
        return $html;
    }
}
