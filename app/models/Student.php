<?php

class Student{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }

    public function validateUser($id){
        $this->db->query("SELECT id_student FROM student WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $id = $this->db->registerById();

        if($id[0] != 0 && is_numeric($id[0])){
            return $id[0];
        }else{
            return 0;
        }
    }

    public function getStudentById($id){
        $this->db->query("SELECT * FROM student WHERE id_student=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->register();
        return $result;
    }

    public function getStudents(){
        $this->db->query("SELECT * FROM person,student WHERE person.id_person=student.id_person");
        $result = $this->db->registers();
        return $result;
    }

    public function add_student($id){
                
        $this->db->query("INSERT INTO student(id_person) VALUES (:id)");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete_student($id){
        $this->db->query("DELETE FROM student WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }


}