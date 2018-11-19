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

    public function getClassesTeacher($id)
    {
        $this->db->query("SELECT class.name_class,class.classroom,category.name_category,schedule.init_time,schedule.end_date,schedule.day_week FROM class,schedule,category WHERE class.id_teacher=(select id_teacher from teacher where id_person=:id) AND category.id_category=class.id_category AND class.id_schedule=schedule.id_schedule AND init_date<=now() AND end_date>now()");
        $this->db->bind(':id',$id);
        $result= $this->db->registers();
        return $result;
    }

    public function getClassesStudent($id)
    {
        $this->db->query("SELECT distinct class.name_class,class.classroom,category.name_category,schedule.init_time,schedule.end_date,schedule.day_week,person.name_person, person.last_name_person, person.email_person FROM class,schedule,category,class_student,person
        WHERE class_student.id_student=(select id_student from student where id_person=:id) 
        AND person.id_person = (select id_person from teacher where id_teacher=class.id_teacher) 
        AND class.id_class=class_student.id_class AND category.id_category=class.id_category 
        AND class.id_schedule=schedule.id_schedule AND init_date<=now() AND end_date>now()");
        $this->db->bind(':id',$id);
        $result= $this->db->registers();
        return $result;
    }

    public function getLessonsAvailable()
    {
        $this->db->query("SELECT class.id_class, class.description_class, class.id_category, category.name_category FROM class, category WHERE class.id_category = category.id_category ");
        $result= $this->db->registers();
        return $result;
    }

    public function getScheduleByClassId($id_class)
    {
        $this->db->query("SELECT  schedule.day_week, schedule.init_time, schedule.end_time FROM schedule, class  WHERE class.id_class=:id_class");
        $this->db->bind(':id_class',$id_class);
        $result= $this->db->registers();
        return $result;
    }
    
    
}