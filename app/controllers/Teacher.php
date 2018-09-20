<?php 
class Teacher extends Controller{
        
         /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModelo = $this->model('Login');
            $this->personModel = $this->model('Person');
            define('TEMPLATE','Docente');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        public function start(){
            $this->view('/teacher/main_teacher');
        }
    
        public function see_profile(){
            $this->view('/teacher/see_profile_teacher');
        }

        public function history_lessons(){
            $this->view('/teacher/history_lessons');
        }

        public function lessons(){
            $this->view('/teacher/class_teacher');
        }

        public function edit_profile(){
            $this->view('/teacher/update_profile_teacher');
        }

        public function update_password(){
            $this->view('/teacher/update_password_teacher');
        }

        public function request_class(){
            $this->view('/teacher/request_class_teacher');
        }
    
    }