<?php
    /*
    Traer y mapear la url ingresada en el navegador,
    1- Controlador
    2- Funciones, métodos
    3- Parámetros
    */

    class Core{
        // Carga controlador por defecto si no hay otro
        protected $controladorActual = 'Pages';
        // Mientras no se carge ninguna url será url por defecto
        protected $metodoActual = 'index';
        // No se haga ninguna llamado a métodos con parametros el arreglo será vació
        protected $parametros = [];

        // constructor
        public function __construct(){
            $url = $this->getUrl();
            // buscar en controladors si el controlador existe
            if(file_exists('../app/controllers/' . ucwords($url[0]).'.php')){
                // si existe se sete o configura como controlador por defecto
                $this ->controladorActual = ucwords($url[0]);
                
                //unset indice 0
                unset($url[0]);
            }

            //requerir controlador 
            require_once '../app/controllers/'. $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;
            
            // verificar la segunda parte de la url
            if(isset($url[1])){
                if(method_exists($this->controladorActual, $url[1])){
                    // chequeamos el método
                    $this->metodoActual = $url[1];
                
                    //unset indice 0
                    unset($url[0]);
                }
            }

            //obtener parámetros
            $this->parametro = $url ? array_values($url) : [];
            
            // llamar callback con parametros array
            call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros);
            
        }
        
        public function getUrl(){
            
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }


    }