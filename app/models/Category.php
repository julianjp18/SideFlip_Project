<?php

    class Category{
        private $db;

        public function __construct(){
            // Acceso a Base de datos
            $this->db = new Base;
        }

        public function getCategoryById($id){
            $this->db->query("SELECT * FROM category WHERE id_category=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->register();
            return $result;
        }

        public function getCategories(){
            $this->db->query("SELECT * FROM category");
            $result = $this->db->registers();
            return $result;
        }

        public function add_category($data){
                
            $this->db->query("INSERT INTO category(name_category,description_category) VALUES (:name,:description)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function delete_category($id){
            $this->db->query("DELETE FROM category WHERE id_category=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function update_category($id,$data){
            $this->db->query("UPDATE category SET name_category=:name,description_category=:description WHERE id_category=:id");
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

/** 
        public function editarPersona($id,$datos){
            
            if($datos['foto'] == 'none'){
                
                $this->db->query("UPDATE person SET nombre=:nombre,direccion=:direccion,nit=:nit,telefono=:telefono,correo=:correo WHERE cod_usuario=:id");
                $this->db->bind(':id', $id);
                $this->db->bind(':nombre', $datos['nombre']);
                $this->db->bind(':direccion', $datos['direccion']);
                $this->db->bind(':nit', $datos['nit']);
                $this->db->bind(':telefono', $datos['telefono']);
                $this->db->bind(':correo',$datos['correo']);
                $resultado = $this->db->execute();
            }else{
                
                $this->db->query("UPDATE person SET nombre=:nombre,direccion=:direccion,nit=:nit,telefono=:telefono,correo=:correo,url=:foto WHERE cod_usuario=:id");
                $this->db->bind(':id', $id);
                $this->db->bind(':nombre', $datos['nombre']);
                $this->db->bind(':direccion', $datos['direccion']);
                $this->db->bind(':nit', $datos['nit']);
                $this->db->bind(':telefono', $datos['telefono']);
                $this->db->bind(':correo',$datos['correo']);
                $this->db->bind(':foto', $datos['foto']);
                $resultado = $this->db->execute();
            }
            if($resultado){
                return true;
            }else{
                return false;
            }
        }
        
        
        */
}
    