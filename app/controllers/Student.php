<?php 
class Student extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModel = $this->model('Login');
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
            session_start();
            $this->view('/student/main_student');
        }
    
        public function see_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/student/see_profile_student',$result);
        }

        public function edit_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/student/update_profile_student',$result);
        }

        public function history_lessons(){
            $this->view('/student/history_lessons');
        }

        public function lessons(){
            $this->view('/student/class_student');
        }

        public function update_password(){
            $this->view('/student/update_password_student');
        }

        public function request_class(){
            $this->view('/student/request_class_student');
        }
    
    }