<?php

class Login{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }

    public function validateUser($data){
        $this->db->query("SELECT id_person,name_person FROM person WHERE email_person=:email");
        $this->db->bind(':email', $data['email']);
        $result = $this->db->register();
        $id= $result->id_person;
        if($id != 0 && is_numeric($id)){
            $this->db->query("SELECT * FROM login WHERE id_person=:id AND password=:pwd");
            $this->db->bind(':id', $id);
            $this->db->bind(':pwd', $data['password']);
            $valid = $this->db->register();
            if($valid){
                return $result;
            }else{
                return 0;
            }
        }
    }

    public function update_password($id,$data){
              
        $this->db->query("SELECT id_person FROM login WHERE id_person=:id AND password=:pwd");
        $this->db->bind(':id', $id);
        $this->db->bind(':pwd', $data['old']);
        $valid = $this->db->register();
        if($valid){
            $this->db->query("UPDATE login SET password=:pwd WHERE id_person=:id");
            $this->db->bind(':id', $id);
            $this->db->bind(':pwd', $data['new_1']);

            $result = $this->db->execute();
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function add_login($id,$password){

        $this->db->query("INSERT INTO login(id_person,password,created_at) VALUES (:id,:pass,now())");
        $this->db->bind(':id', $id);
        $this->db->bind(':pass', $password);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete_login($id){
        $this->db->query("DELETE FROM login WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

}