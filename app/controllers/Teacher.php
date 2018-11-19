<?php 
class Teacher extends Controller{
        
         /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModel = $this->model('Login');
            $this->personModel = $this->model('Person');
            $this->lessonModel = $this->model('Lesson');
            $this->classStudentModel = $this->model('Class_Student');
            define('TEMPLATE','Docente');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        public function start(){
            session_start();
            $result = $this->lessonModel->getClassesTeacher($_SESSION['id']);
            $this->view('/teacher/main_teacher',$result);
        }
    
        public function see_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/teacher/see_profile_teacher',$result);
        }

        public function edit_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/teacher/update_profile_teacher',$result);
        }

        public function history_lessons(){
            $this->view('/teacher/history_lessons');
        }

        public function lessons(){
            session_start();
            $datas = array('lessons' => [], 'emails' => [] );
            $datas['lessons'] = $this->lessonModel->getClassesTeacher($_SESSION['id']);
            $datas['emails'] = $this->personModel->getPersonEmailById($_SESSION['id']);
            $datas['person'] = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/teacher/class_teacher',$datas);
        }

        public function update_password(){
            $this->view('/teacher/update_password_teacher');
        }

        public function request_class(){
            $this->view('/teacher/request_class_teacher');
        }
    
    }