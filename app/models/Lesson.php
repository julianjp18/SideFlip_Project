<?php

/**
 * Clase para la tabla class
 */
class Lesson{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }

    public function getClasses(){
        $this->db->query("SELECT * FROM class");
        $result = $this->db->registers();
        return $result;
    }
    
    /**
     * Obtiene una clase por su id
     */
    public function getClassById($id){
        $this->db->query("SELECT * FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);
        $result = $this->db->register();
        return $result;
    }

    public function add_class($data){

        $this->db->query("INSERT INTO class(description_class,id_teacher,id_category,id_rhythm,id_schedule,name_class,classroom) VALUES (:description_class,:id_teacher,:id_category,:id_rhythm,:id_schedule,:name_class,:classroom)");
        $this->db->bind(':description_class', $data['description']);
        $this->db->bind(':id_teacher', $data['id_teacher']);
        $this->db->bind(':id_category', $data['id_category']);
        $this->db->bind(':id_rhythm', $data['id_rhythm']);
        $this->db->bind(':id_schedule', $data['id_schedule']);
        $this->db->bind(':name_class', $data['name']);
        $this->db->bind(':classroom', $data['classroom']);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete_class($id){
        $this->db->query("SELECT id_schedule FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);

        $result = $this->db->registerById();
        
        $this->db->query("DELETE FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);
        $result2 = $this->db->execute();  
        if($result2){
            if(intval($result[0]) != 0){
                return $result[0];
            }else{
                return 0;
            }
        }else{
            return -1;
        }
    }

    public function update_class($id,$data){
        $this->db->query("UPDATE class SET description_class=:description_class,id_teacher=:id_teacher,id_category=:id_category,id_rhythm=:id_rhythm,id_schedule=:id_schedule,name_class=:name_class,classroom=:classroom WHERE id_class=:id");
        $this->db->bind(':id', $id);
        $this->db->bind(':description_class', $data['description']);
        $this->db->bind(':id_teacher', $data['id_teacher']);
        $this->db->bind(':id_category', $data['id_category']);
        $this->db->bind(':id_rhythm', $data['id_rhythm']);
        $this->db->bind(':id_schedule', $data['id_schedule']);
        $this->db->bind(':name_class', $data['name']);
        $this->db->bind(':classroom', $data['classroom']);
        $result = $this->db->execute();  
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getScheduleClassById($id){
        $this->db->query("SELECT id_schedule FROM class WHERE id_class=:id");
        $this->db->bind(':id', $id);
        
        $result = $this->db->registerById();
        if(intval($result[0]) != 0){
            return $result[0];
        }else{
            return 0;
        }
    }

    /**
     * Obtiene las clases que se realizarán recientemente
     */
    public function getRecentsClasses(){
        $this->db->query("SELECT class.name_class,class.classroom,category.name_category,schedule.init_time,schedule.end_date,schedule.day_week FROM class,schedule,category WHERE category.id_category=class.id_category AND class.id_schedule=schedule.id_schedule AND init_date<=now() AND end_date>now()");
        $result = $this->db->registers();
        return $result;
    }

}