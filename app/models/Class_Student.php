<?php

class Class_Student{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }


    public function getStudentsUnregisterClass($id){
        $this->db->query("
        SELECT person.name_person,person.last_name_person,person.age,student.id_student
        FROM person,student
        WHERE NOT EXISTS
            (SELECT 1
            FROM student,class_student WHERE class_student.id_class=:id ) 
            AND person.id_person=student.id_person
        ORDER BY name_person,last_name_person; ");
        $this->db->bind(':id', $id);
        $result = $this->db->registers();
        return $result;
    }

    public function getStudentsRegisterClass($id){
        $this->db->query("
        SELECT person.id_person,name_person,last_name_person,age,celphone_person,email_person,id_student
        FROM person,student
        WHERE EXISTS
            (SELECT 1
            FROM student,class_student WHERE class_student.id_class=:id ) 
            AND person.id_person=student.id_person
        ORDER BY name_person,last_name_person,age,celphone_person,email_person;
        ");
        $this->db->bind(':id', $id);
        $result2 = $this->db->registers();
        return $result2;
    }

    public function add_student_class($id_class,$id_student){
        $this->db->query("INSERT INTO class_student(id_class,id_student) VALUES (:id_class,:id_student)");
        $this->db->bind(':id_class', $id_class);
        $this->db->bind(':id_student', $id_student);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete_student_class($id_student,$id_class){
        $this->db->query("DELETE FROM class_student WHERE id_student=:id_student AND id_class=:id_class");
        $this->db->bind(':id_student', $id_student);
        $this->db->bind(':id_class', $id_class);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

}