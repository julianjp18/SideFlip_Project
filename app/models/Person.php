<?php

    class Person{
        private $db;

        public function __construct(){
            // Acceso a Base de datos
            $this->db = new Base;
        }

        public function obtenerPersonaPorId($id){
            $this->db->query("SELECT * FROM person WHERE cod_usuario=:id");
            $this->db->bind(':id', $id);
            $resultado = $this->db->registro();
            return $resultado;
        }

        public function obtenerPersonaPorEmail($correo){
            $this->db->query("SELECT nombre FROM person WHERE correo=:correo");
            $this->db->bind(':correo', $correo);
            $resultado = $this->db->registro();
            return $resultado;
        }

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
        
        public function agregarPersona($datos){
                
            $this->db->query("INSERT INTO person(nombre,direccion,nit,correo,telefono,url) VALUES (:nombre,:direccion,:nit,:correo,:telefono,:foto) ");
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':direccion', $datos['direccion']);
            $this->db->bind(':nit', $datos['nit']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':correo',$datos['correo']);
            $this->db->bind(':foto', $datos['foto']);
            $resultado = $this->db->execute();
            
            if($resultado){

                $this->db->query("SELECT cod_usuario FROM person WHERE nombre=:nombre AND direccion=:direccion AND nit=:nit AND correo=:correo AND telefono=:telefono");
                $this->db->bind(':nombre', $datos['nombre']);
                $this->db->bind(':direccion', $datos['direccion']);
                $this->db->bind(':nit', $datos['nit']);
                $this->db->bind(':telefono', $datos['telefono']);
                $this->db->bind(':correo',$datos['correo']);

                $resultado = $this->db->registroPorId();
                if(intval($resultado[0]) != 0){
                    return $resultado[0];
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }
    }