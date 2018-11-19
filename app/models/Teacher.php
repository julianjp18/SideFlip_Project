<?php

class Teacher{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }

    public function validateUser($id){
        $this->db->query("SELECT id_teacher FROM teacher WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $id = $this->db->registerById();

        if($id[0] != 0 && is_numeric($id[0])){
            return $id[0];
        }else{
            return 0;
        }
    }

    public function getTeacherById($id){
        $this->db->query("SELECT * FROM teacher WHERE id_teacher=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->register();
        return $result;
    }

    public function getTeachers(){
        $this->db->query("SELECT * FROM person,teacher WHERE person.id_person=teacher.id_person");
        $result = $this->db->registers();
        return $result;
    }

    public function add_teacher($id){
                
        $this->db->query("INSERT INTO teacher(id_person) VALUES (:id)");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete_teacher($id){
        $this->db->query("DELETE FROM teacher WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

}