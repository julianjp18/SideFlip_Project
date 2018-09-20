<?php

    // Clase controlador principal
    // Se encarga de poder cargar los modelos y las vistas
    class Controller{

        public function __construct(){
            
        }
        //Cargar modelo
        public function model($model){
            // Carga
            require_once '../app/models/'. $model.'.php';
            return new $model();
        }
        
        //Cargar vista
        public function view($view,$datos = []){
            // Validar si el archio existe
            if(file_exists('../app/views/'. $view.'.php')){
                require_once '../app/views/'. $view.'.php';
            }else{
                die('La vista no se encuentra disponible o no existe');
            }
        }
    }