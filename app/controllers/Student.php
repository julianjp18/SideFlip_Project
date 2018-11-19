<?php 
class Student extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModel = $this->model('Login');
            $this->personModel = $this->model('Person');
            $this->lessonModel = $this->model('Lesson');
            $this->categoryModel = $this->model('Category');
            $this->rhythmModel = $this->model('Rhythm');
            $this->scheduleModel = $this->model('Schedule');

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
            $result = $this->lessonModel->getClassesStudent($_SESSION['id']);
            $this->view('/student/main_student',$result);
            
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
            session_start();
            $datas = array("classes" => [],"lessons" => [] );
            $datas['classes'] = $this->lessonModel->getClassesStudent($_SESSION['id']);
            $lessonsAvailable = $this->rhythmModel->getRhythmsName();
            $datas['lessons'] = $lessonsAvailable;
            $datas['persons'] = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/student/class_student',$datas);
        
        }

        public function update_password(){
            $this->view('/student/update_password_student');
        }

        public function request_class(){
            session_start();
            $datas = array('schedules' => []);
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_rhythm= trim($_POST['cpk_student']);
                if ($id_rhythm !=  (string )(int) $id_rhythm) {
                    echo "No es entero";
                }
                else {
                    
                    $id = $id_rhythm;
                    $datas['schedules'] = $this->scheduleModel->getDescriptionScheduleByRhythm($id);
                }
                
            }
            $datas['persons'] = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/student/request_class_student', $datas);
            
            
        }
    
    }