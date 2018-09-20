<?php 
class Supervisor extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModelo = $this->model('Login');
            $this->personModel = $this->model('Person');
            define('TEMPLATE','Asesor');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        public function start(){
            $this->view('/supervisor/main_supervisor');
        }

        public function see_profile(){
            $this->view('/supervisor/see_profile_supervisor');
        }

        public function edit_profile(){
            $this->view('/supervisor/update_profile_supervisor');
        }

        public function update_password(){
            $this->view('/supervisor/update_password_supervisor');
        }

        public function lessons(){
            $this->view('/supervisor/class_supervisor');
        }   

        public function categories(){
            $this->view('/supervisor/category_supervisor');
        }

        public function rhythms(){
            $this->view('/supervisor/rhythm_supervisor');
        }

        public function students(){
            $this->view('/supervisor/student_supervisor');
        }

        public function teachers(){
            $this->view('/supervisor/teacher_supervisor');
        }
    
    }