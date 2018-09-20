<?php
    function redireccionar($pagina){
        header('Location: '. RUTA_URL. $pagina );
    }

    function validarSesion(){
        session_start();
        if(!isset($_SESSION['id']) || $_SESSION['id'] <= 0){
            return false;
        }else{
            return true;
        }
    }