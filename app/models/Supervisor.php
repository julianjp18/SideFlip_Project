<?php

class Supervisor{
    private $db;

    public function __construct(){
        // Acceso a Base de datos
        $this->db = new Base;
    }

    public function validateUser($id){
        $this->db->query("SELECT id_supervisor FROM supervisor WHERE id_person=:id");
        $this->db->bind(':id', $id);
        $id = $this->db->registerById();

        if($id[0] != 0 && is_numeric($id[0])){
            return $id[0];
        }else{
            return 0;
        }
    }

}