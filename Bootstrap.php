<?php

require_once(dirname(__FILE__).'/config/config.php');
/**
 * Bootstrap class
 * Is there to interpret the requested url and fetch the right controller and action
 */
class Bootstrap {
    
    //Params from the URI
    private $_params;
    //Name of the controller
    private $_controller;
    //Name of the action
    private $_action;
    
    /**
     * Construction method
     * @param address array of the parts of the requested URL
     */
    public function __construct($address){
        try {
            if (!empty($address)) {
                //Parse the array to extract the required informations
                $_controller = (($address[0] !== '' && $address[0] !== 'index.php') ? ucfirst($address[0]).'Controller' : 'IndexController');
                $_action = (isset($address[1]) ? $address[1].'Action' : 'indexAction');
                $nb = count($address) - 2;
                for($i=1;$i<=$nb/2;$i++){
                    $_params[$address[$i*2]] = $address[$i*2+1];
                }
                //Include the required controller
                include_once(PATH.'/application/'.$_controller.'.php');
                //Create the controller if available
                if (class_exists($_controller)) {
                    $cont = new $_controller((isset($address[1]) ? $address[1] : 'index'), (($address[0] !== '' && $address[0] !== 'index.php') ? $address[0] : 'index'), $_params);
                } else {
                    throw new Exception('Controller doesn\'t exists');
                }
                //Launch the action if abale to
                if (isset($_action)) { 
                    if (method_exists($cont, $_action)) {
                        $cont->$_action();
                    } else {
                        throw new Exception('Action doesn\'t exists');
                    }
                } else {
                    $cont->indexAction();
                }
            } else {
                throw new Exception('The requested url is invalid');
            }
        } catch (Exception $e) {
            echo '<pre>';var_dump($e);
        }
    }
}
