<?php 
class Pages extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModelo = $this->model('Login');
            $this->personModel = $this->model('Person');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        public function ingresar(){
            define("TEMPLATE",'Inicio de sesión');
            $this->view('/login'); 
        }

        public function student(){
            redireccionar('/Student/start');
        }

        public function teacher(){
            redireccionar('/Teacher/start');
        }

        public function supervisor(){
            redireccionar('/Supervisor/start');
        }   
    }