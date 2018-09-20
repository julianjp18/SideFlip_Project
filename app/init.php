<?php
    //Cargar librerias
    require_once 'config/constants.php';
    
    require_once 'helpers/helper.php';
    
    //autoload php para cargar archivos de libraries
    spl_autoload_register(function($className){
        require_once 'libraries/'. $className . '.php';
    }); 
    
    