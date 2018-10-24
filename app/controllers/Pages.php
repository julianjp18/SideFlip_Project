<?php 
class Pages extends Controller{
        
    /**
     * Constructor, se instancian las clases de los modelos a utilizar
     */
    public function __construct(){
        $this->loginModel = $this->model('Login');
        $this->studentModel = $this->model('Student');
        $this->supervisorModel = $this->model('Supervisor');
        $this->teacherModel = $this->model('Teacher');
        $this->personModel = $this->model('Person');
    }

    /**
     * llama a vista principal de SideFlip
     */
    public function index(){
        $this->view('/index');
    }

    /**
     * Ingresar a la vista de inicio de sesión
     */
    public function ingresar(){
        define("TEMPLATE",'Inicio de sesión');
        $this->view('/login'); 
    }
    /**
     * Valida la autenticación
     */
    public function autentication(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'email' => trim($_POST['txt_email']),
                'password' => trim($_POST['txt_password'])
            ];
            $result = $this->loginModel->validateUser($data);
            if($result->id_person != 0){ 
                $id=$result->id_person;                   
                $profileStudent = $this->studentModel->validateUser($id);
                $profileTeacher = $this->teacherModel->validateUser($id);
                $profileSupervisor = $this->supervisorModel->validateUser($id);
                if($profileStudent != 0){
                    $_SESSION['id']=$result->id_person;
                    $_SESSION['name']=$result->name_person;
                    $_SESSION['student']=3;
                    redireccionar('/Student/start');
                } else if($profileTeacher != 0){
                    $_SESSION['id']=$result->id_person;
                    $_SESSION['name']=$result->name_person;
                    $_SESSION['teacher']=2;
                    redireccionar('/Teacher/start');
                } else if($profileSupervisor != 0){
                    $_SESSION['id']=$result->id_person;
                    $_SESSION['name']=$result->name_person;
                    $_SESSION['supervisor']=1;
                    redireccionar('/Supervisor/start');
                } else{
                    $_SESSION['message']='Usuario y/o contraseña incorrectos';
                    redireccionar('/Pages/ingresar');
                }
            }else{
                $_SESSION['message']='Usuario y/o contraseña incorrectos';
                redireccionar('/Pages/ingresar');
            }
        }else{
            redireccionar('/Pages/ingresar');
        }
    }

    /**
     * Modifica la información del usuario autenticado
     */
    public function update_profile(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'name' => trim($_POST['txt_name']),
                'last_name' => trim($_POST['txt_last_name']),
                'email' => trim($_POST['txt_email']),
                'identification' => trim($_POST['txt_identification']),
                'phone' => trim($_POST['txt_phone']),
                'celphone' => trim($_POST['txt_celphone']),
                'birth_date' => trim($_POST['txt_birth_date']),
                'address' => trim($_POST['txt_address'])
            ];

            $result = $this->personModel->update_person($_SESSION['id'],$data);

            if($result){
                $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> la información correctamente</b>'.'</div>';
            }else{
                $_SESSION['message']='<div class="card-panel yellow darken-4">'.'NO se actualizó la información, por favor inténtelo de nuevo.'.'</div>';    
            }
            if(!isset($_SESSION['supervisor']) && $_SESSION['supervisor'] == 1){
                redireccionar('/Supervisor/edit_profile');
            } else if(isset($_SESSION['teacher']) && $_SESSION['teacher'] == 2){
                redireccionar('/Teacher/edit_profile');
            } else if(isset($_SESSION['student']) && $_SESSION['student'] == 3){
                redireccionar('/Student/edit_profile');
            } else{
                redireccionar('/Pages/ingresar');
            }
        }
    }
    /**
     * Actualiza la contraseña del usuario autenticado
     */
    public function update_password(){
        session_start();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'old' => trim($_POST['txt_old_password']),
                'new_1' => trim($_POST['txt_password_1']),
                'new_2' => trim($_POST['txt_password_2']) 
            ];
            if($data['new_1']===$data['new_2']){
                
                $result = $this->loginModel->update_password($_SESSION['id'],$data);

                if($result){
                    $_SESSION['message']='<div class="card-panel light-green accent-4 center-align">'.'<b>Se <ins>actualizó</ins> la contraseña correctamente</b>'.'</div>';
                }else{
                    $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'<ins>NO</ins> se actualizó la contraseña, por favor inténtelo de nuevo.'.'</div>';    
                }
            }else{
                $_SESSION['message']='<div class="card-panel yellow darken-4 center-align">'.'Ingrese la contraseña nueva <ins>correctamente</ins>'.'</div>';    
            } 
            if($_SESSION['supervisor'] == 1){
                redireccionar('/Supervisor/update_password');
            } else if($_SESSION['teacher'] == 2){
                redireccionar('/Teacher/update_password');
            } else if($_SESSION['student'] == 3){
                redireccionar('/Student/update_password');
            } else{
                redireccionar('/Pages/ingresar');
            }
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        redireccionar('/Pages/ingresar');
    }
}