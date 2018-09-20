<?php 
class Student extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModelo = $this->model('Login');
            $this->personModel = $this->model('Person');
            define('TEMPLATE','Estudiante');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        public function start(){
            $this->view('/student/main_student');
        }
    
        public function see_profile(){
            $this->view('/student/see_profile_student');
        }

        public function history_lessons(){
            $this->view('/student/history_lessons');
        }

        public function lessons(){
            $this->view('/student/class_student');
        }

        public function edit_profile(){
            $this->view('/student/update_profile_student');
        }

        public function update_password(){
            $this->view('/student/update_password_student');
        }

        public function request_class(){
            $this->view('/student/request_class_student');
        }
    
    }