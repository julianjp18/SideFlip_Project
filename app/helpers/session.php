<?php
    if(!isset($_SESSION['id'])){
        header('Location: '. RUTA_URL.'/');
    }
?>