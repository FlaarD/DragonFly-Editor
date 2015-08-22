<?php
    /**
     * Main file of the application that basically just go fetch the Bootstrap
     */
    require_once dirname(__FILE__).'/../Bootstrap.php';
    $address = explode('/',substr($_SERVER['REQUEST_URI'],1));
    new Bootstrap($address);
    