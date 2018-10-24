<?php

    class Rhythm{
        private $db;

        public function __construct(){
            // Acceso a Base de datos
            $this->db = new Base;
        }

        public function getRhythmById($id){
            $this->db->query("SELECT * FROM rhythm WHERE id_rhythm=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->register();
            return $result;
        }

        public function getRhythms(){
            $this->db->query("SELECT * FROM rhythm");
            $result = $this->db->registers();
            return $result;
        }

        public function add_rhythm($data){
                
            $this->db->query("INSERT INTO rhythm(name_rhythm,description_rhythm) VALUES (:name,:description)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function delete_rhythm($id){
            $this->db->query("DELETE FROM rhythm WHERE id_rhythm=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function update_rhythm($id,$data){
            $this->db->query("UPDATE rhythm SET name_rhythm=:name,description_rhythm=:description WHERE id_rhythm=:id");
            $this->db->bind(':id', $id);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }