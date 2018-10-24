<?php 
/**
 *  Controlador para el usuario Asesor
 */
class Supervisor extends Controller{
        
        /**
         * Constructor, se instancian las clases de los modelos a utilizar
         */
        public function __construct(){
            $this->loginModel = $this->model('Login');
            $this->personModel = $this->model('Person');
            $this->categoryModel = $this->model('Category');
            $this->rhythmModel = $this->model('Rhythm');
            $this->studentModel = $this->model('Student');
            $this->teacherModel = $this->model('Teacher');
            $this->classModel = $this->model('Lesson');
            $this->scheduleModel = $this->model('Schedule');
            $this->classStudentModel = $this->model('Class_Student');
            
            define('TEMPLATE','Asesor');
        }
    
        /**
         * llama a vista principal de SideFlip
         */
        public function index(){
            $this->view('/index');
        }

        /**
         * Llama a la vista principal del menú de supervisor
         */
        public function start(){
            session_start();
            $result = $this->classModel->getRecentsClasses();
            $this->view('/supervisor/main_supervisor',$result);
        }

        /**
         * Llama vista de pérfil 
         */
        public function see_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/supervisor/see_profile_supervisor',$result);
        }

        /**
         * Llama vista de modificar pérfil
         */
        public function edit_profile(){
            session_start();
            $result = $this->personModel->getPersonById($_SESSION['id']);
            $this->view('/supervisor/update_profile_supervisor',$result);
        }

        /**
         * Envia a la vista para modificar contraseña
         */
        public function update_password(){
            $this->view('/supervisor/update_password_supervisor');
        } 

        /**
         * Llama vista de categorias
         */
        public function categories(){
            session_start();
            $result = $this->categoryModel->getCategories();
            $this->view('/supervisor/category_supervisor',$result);
        }

        public function add_category(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'name' => trim($_POST['txt_name']),
                    'description' => trim($_POST['textarea_msj'])
                ];
                $result = $this->categoryModel->add_category($data);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> una nueva categoria correctamente</b>'.'</div>';
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó una nueva categoria, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/categories');
                
            }
        }

        public function delete_category(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->categoryModel->delete_category($value);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> la categoria correctamente</b>'.'</div>';
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó la categoria, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/categories');
            }else{
                redireccionar('/Supervisor/categories');
            }
        }

        public function update_category(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'name' => trim($_POST['txt_name']),
                        'description' => trim($_POST['textarea_msj'])
                    ];
                    $result = $this->categoryModel->update_category($value,$data);
                    if($result){
                        $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> una nueva categoria correctamente</b>'.'</div>';
                    }else{
                        $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó actualizó la categoria, por favor inténtelo de nuevo.'.'</div>';    
                    }
                    redireccionar('/Supervisor/categories');
                }
                redireccionar('/Supervisor/categories');
            }else{
                redireccionar('/Supervisor/categories');
            }
        }

        /**
         * Llama vista de ritmos
         */
        public function rhythms(){
            session_start();
            $result = $this->rhythmModel->getRhythms();
            $this->view('/supervisor/rhythm_supervisor',$result);
        }

        public function add_rhythm(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'name' => trim($_POST['txt_name']),
                    'description' => trim($_POST['txt_description'])
                ];
                $result = $this->rhythmModel->add_rhythm($data);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> un nuevo ritmo correctamente</b>'.'</div>';
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó un nuevo ritmo, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/rhythms');
                
            }
        }

        public function delete_rhythm(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->rhythmModel->delete_rhythm($value);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> la categoria correctamente</b>'.'</div>';
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó la categoria, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/rhythms');
            }else{
                redireccionar('/Supervisor/rhythms');
            }
        }

        public function update_rhythm(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'name' => trim($_POST['txt_name']),
                        'description' => trim($_POST['txt_description'])
                    ];
                    $result = $this->rhythmModel->update_rhythm($value,$data);
                    if($result){
                        $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> una nueva categoria correctamente</b>'.'</div>';
                    }else{
                        $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó actualizó la categoria, por favor inténtelo de nuevo.'.'</div>';    
                    }
                    redireccionar('/Supervisor/rhythms');
                }
                redireccionar('/Supervisor/rhythms');
            }else{
                redireccionar('/Supervisor/rhythms');
            }
        }

        /**
         * Llama vista de estudiantes
         */
        public function students(){
            session_start();
            $result = $this->studentModel->getStudents();
            $this->view('/supervisor/student_supervisor',$result);
        }

        public function add_student(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'name' => trim($_POST['txt_name']),
                    'last_name' => trim($_POST['txt_last_name']),
                    'email' => trim($_POST['txt_email']),
                    'phone' => trim($_POST['txt_phone']),
                    'celphone' => trim($_POST['txt_celphone']),
                    'address' => trim($_POST['txt_address']),
                    'birth_date' => trim($_POST['txt_date_birth']),
                    'identification' => trim($_POST['txt_identification'])
                ];
                $idPerson = $this->personModel->add_person($data);
                
                if($idPerson > 0){
                    $result = $this->studentModel->add_student($idPerson);
                    if($result){
                        $result2 = $this->loginModel->add_login($idPerson,trim($_POST['txt_password']));
                        if($result2){
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> un nuevo estudiante correctamente</b>'.'</div>';
                        }
                    }
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó un nuevo estudiante, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/students');
                
            }
        }

        public function delete_student(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->personModel->delete_person($value);
                if($result){
                    $result2 = $this->studentModel->delete_student($value);
                    if($result2){
                        $result3 = $this->loginModel->delete_login($value); 
                        if($result3){
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> el estudiante correctamente</b>'.'</div>';
                        }
                    }
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó el estudiante, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/students');
            }else{
                redireccionar('/Supervisor/students');
            }
        }

        public function update_student(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'name' => trim($_POST['txt_name2']),
                        'last_name' => trim($_POST['txt_last_name2']),
                        'email' => trim($_POST['txt_email2']),
                        'phone' => trim($_POST['txt_phone2']),
                        'celphone' => trim($_POST['txt_celphone2']),
                        'address' => trim($_POST['txt_address2']),
                        'birth_date' => trim($_POST['txt_date_birth2']),
                        'identification' => trim($_POST['txt_identification2'])
                    ];
                    $result = $this->personModel->update_person($value,$data);
                    if($result){
                        $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> la información del estudiante correctamente</b>'.'</div>';
                    }else{
                        $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó actualizó la información del estudiante, por favor inténtelo de nuevo.'.'</div>';    
                    }
                    redireccionar('/Supervisor/students');
                }
                redireccionar('/Supervisor/students');
            }else{
                redireccionar('/Supervisor/students');
            }
        }

        /**
         * Llama vista de docentes
         */
        public function teachers(){
            session_start();
            $result = $this->teacherModel->getTeachers();
            $this->view('/supervisor/teacher_supervisor',$result);
        }

        public function add_teacher(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'name' => trim($_POST['txt_name']),
                    'last_name' => trim($_POST['txt_last_name']),
                    'email' => trim($_POST['txt_email']),
                    'phone' => trim($_POST['txt_phone']),
                    'celphone' => trim($_POST['txt_celphone']),
                    'address' => trim($_POST['txt_address']),
                    'birth_date' => trim($_POST['txt_date_birth']),
                    'identification' => trim($_POST['txt_identification'])
                ];
                $idPerson = $this->personModel->add_person($data);
                
                if($idPerson > 0){
                    $result = $this->teacherModel->add_teacher($idPerson);
                    if($result){
                        $result2 = $this->loginModel->add_login($idPerson,trim($_POST['txt_password']));
                        if($result2){
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> un nuevo docente correctamente</b>'.'</div>';
                        }
                    }
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó un nuevo docente, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/teachers');
                
            }
        }

        public function delete_teacher(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->personModel->delete_person($value);
                if($result){
                    $result2 = $this->teacherModel->delete_teacher($value);
                    if($result2){
                        $result3 = $this->loginModel->delete_login($value); 
                        if($result3){
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> el docente correctamente</b>'.'</div>';
                        }
                    }
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó el docente, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/teachers');
            }else{
                redireccionar('/Supervisor/teachers');
            }
        }

        public function update_teacher(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data = [
                        'name' => trim($_POST['txt_name2']),
                        'last_name' => trim($_POST['txt_last_name2']),
                        'email' => trim($_POST['txt_email2']),
                        'phone' => trim($_POST['txt_phone2']),
                        'celphone' => trim($_POST['txt_celphone2']),
                        'address' => trim($_POST['txt_address2']),
                        'birth_date' => trim($_POST['txt_date_birth2']),
                        'identification' => trim($_POST['txt_identification2'])
                    ];
                    $result = $this->personModel->update_person($value,$data);
                    if($result){
                        $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> la información del docente correctamente</b>'.'</div>';
                    }else{
                        $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó actualizó la información del docente, por favor inténtelo de nuevo.'.'</div>';    
                    }
                    redireccionar('/Supervisor/teachers');
                }
                redireccionar('/Supervisor/teachers');
            }else{
                redireccionar('/Supervisor/teachers');
            }
        }

        /**
         * Llama vista de clases
         */
        public function lessons(){
            session_start();
            $result = $this->classModel->getClasses();
            $datas = array("classes" => [],"teachers" => []);
            foreach ($result as $key) {
                $teacher = $this->teacherModel->getTeacherById($key->id_teacher);
                $person = $this->personModel->getPersonById($teacher->id_person);
                $category = $this->categoryModel->getCategoryById($key->id_category);
                $schedule = $this->scheduleModel->getScheduleById($key->id_schedule);
                $rhythm = $this->rhythmModel->getRhythmById($key->id_rhythm);
                $data = array("id_class"=>$key->id_class,"description_class" => $key->description_class,"name_class" =>$key->name_class,"teacher" =>$person,
                "category" =>$category,"schedule" =>$schedule,"rhythm" =>$rhythm,"id_teacher"=>$key->id_teacher,"classroom"=>$key->classroom);
                array_push($datas['classes'],$data);
            }

            $teachers = $this->teacherModel->getTeachers();
            $categories = $this->categoryModel->getCategories();
            $rhythms = $this->rhythmModel->getRhythms();
            $datas['teachers'] = $teachers;
            $datas['categories'] = $categories;
            $datas['rhythms'] = $rhythms;
            $this->view('/supervisor/class_supervisor',$datas);
        }  

        public function add_class(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'init_date' => trim($_POST['txt_init_date']),
                    'end_date' => trim($_POST['txt_end_date']),
                    'day_week' => trim($_POST['cmb_day']),
                    'init_time' => trim($_POST['txt_init_time']),
                    'end_time' => trim($_POST['txt_end_time'])
                ];
                $schedule = $this->scheduleModel->add_schedule($data);
                
                if($schedule > 0){
                    $data = [
                        'name' => trim($_POST['txt_name']),
                        'description' => trim($_POST['txt_description']),
                        'classroom' => trim($_POST['txt_classroom']),
                        'id_teacher' => trim($_POST['cmb_teacher']),
                        'id_category' => trim($_POST['cmb_category']),
                        'id_rhythm' => trim($_POST['cmb_rhythm']),
                        'id_schedule' => trim($schedule)
                    ];
                        $result = $this->classModel->add_class($data);
                        if($result){
                            
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> una nueva clase correctamente</b>'.'</div>';
                            
                        }else{
                            $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó una nueva clase, por favor inténtelo de nuevo.'.'</div>';
                        }
                
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se creó una nueva clase, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/lessons');
                
            }
            redireccionar('/Supervisor/lessons');
        }

        public function delete_class(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->classModel->delete_class($value);
                if($result > 0){
                    $result2 = $this->scheduleModel->delete_schedule($result[0]);
                    if($result2){
                        
                        $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> la clase correctamente</b>'.'</div>';
                        
                    }
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó la clase, por favor inténtelo de nuevo.'.'</div>';    
                }
                redireccionar('/Supervisor/lessons');
            }else{
                redireccionar('/Supervisor/lessons');
            }
        }

        public function update_class(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                $result = $this->classModel->getClassById($value);
                $datas = array("classes" => [],"teachers" => []);
                $teacher = $this->teacherModel->getTeacherById($result->id_teacher);
                $person = $this->personModel->getPersonById($teacher->id_person);
                $category = $this->categoryModel->getCategoryById($result->id_category);
                $schedule = $this->scheduleModel->getScheduleById($result->id_schedule);
                $rhythm = $this->rhythmModel->getRhythmById($result->id_rhythm);
                $data = array("id_class"=>$result->id_class,"description_class" => $result->description_class,"name_class" =>$result->name_class,"teacher" =>$person,
                "category" =>$category,"schedule" =>$schedule,"rhythm" =>$rhythm,"id_teacher"=>$result->id_teacher,"classroom"=>$key->classroom);
                $datas['classes']=$data;
                

                $teachers = $this->teacherModel->getTeachers();
                $categories = $this->categoryModel->getCategories();
                $rhythms = $this->rhythmModel->getRhythms();
                $datas['teachers'] = $teachers;
                $datas['categories'] = $categories;
                $datas['rhythms'] = $rhythms;
                $this->view('/supervisor/update_class_supervisor',$datas);
            }else{
                redireccionar('/Supervisor/lessons');
            }
        }

        public function update_class_form(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $value = trim($value);
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $days=trim($_POST['cmb_day_update']);
                    $data = [
                        'init_date' => trim($_POST['txt_init_date2']),
                        'end_date' => trim($_POST['txt_end_date2']),
                        'day_week' => $days,
                        'init_time' => trim($_POST['txt_init_time2']),
                        'end_time' => trim($_POST['txt_end_time2'])
                    ];

                    $idSchedule = $this->classModel->getScheduleClassById($value);
                    $schedule = $this->scheduleModel->update_schedule($idSchedule,$data);
                    
                    if($schedule > 0){
                        $data = [
                            'name' => trim($_POST['txt_name2']),
                            'description' => trim($_POST['txt_description2']),
                            'id_teacher' => trim($_POST['cmb_teacher2']),
                            'id_category' => trim($_POST['cmb_category_update']),
                            'id_rhythm' => trim($_POST['cmb_rhythm2']),
                            'id_schedule' => trim($idSchedule),
                            'classroom' => trim($_POST['txt_classroom2'])
                        ];
                        $result = $this->classModel->update_class($value,$data);
                        if($result){
                            
                            $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>Actualizó</ins> la clase correctamente</b>'.'</div>';
                            
                        }else{
                            $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se actualizó la clase, por favor inténtelo de nuevo.'.'</div>';
                        }
                    
                    }else{
                        $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se actualizó la clase, por favor inténtelo de nuevo.'.'</div>';    
                    }
                    redireccionar('/Supervisor/lessons');
                    
                }
                redireccionar('/Supervisor/lessons');
            }else{
                redireccionar('/Supervisor/lessons');
            }
        }

        public function add_student_class(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $value = $segments[5];
            if(is_numeric($value) && !is_null($value)){
                $datas = array("id_class" => $value);
                $datas['students']=$this->classStudentModel->getStudentsUnregisterClass($value);
                $datas['registers_students']=$this->classStudentModel->getStudentsRegisterClass($value);
                $this->view('/supervisor/add_student_class_supervisor',$datas);
            }else{
                redireccionar('/Supervisor/lessons');
            }
  
        }

        public function add_student_class_form(){
            session_start();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_student=trim($_POST['cmb_student']);
                $id_class=trim($_POST['txt_class']);
                $result = $this->classStudentModel->add_student_class($id_class,$id_student);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>agregó</ins> el estudiante a la clase correctamente</b>'.'</div>'; 
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se agregó el estudiante a la clase, por favor inténtelo de nuevo.'.'</div>';
                }
                redireccionar('/Supervisor/lessons');
            }
            
        }

        public function delete_student_class(){
            session_start();
            $uri = $_SERVER['REQUEST_URI'];
            $segments = explode('/' , $uri);
            $id_student = $segments[5];
            $id_class=$segments[7];
            if(is_numeric($id_student) && !is_null($id_student) && is_numeric($id_class) && !is_null($id_class)){
                $result = $this->classStudentModel->delete_student_class($id_student,$id_class);
                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>eliminó</ins> el estudiante a la clase correctamente</b>'.'</div>'; 
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'NO se eliminó el estudiante a la clase, por favor inténtelo de nuevo.'.'</div>';
                }
                redireccionar('/Supervisor/lessons');
            }else{
                redireccionar('/Supervisor/lessons');
            }
        }
    
    }