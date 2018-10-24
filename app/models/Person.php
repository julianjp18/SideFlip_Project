<?php

    class Person{
        private $db;

        public function __construct(){
            // Acceso a Base de datos
            $this->db = new Base;
        }

        public function getPersonById($id){
            $this->db->query("SELECT * FROM person WHERE id_person=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->register();
            return $result;
        }

        public function getPersonByEmail($correo){
            $this->db->query("SELECT nombre FROM person WHERE correo=:correo");
            $this->db->bind(':correo', $correo);
            $resultado = $this->db->registro();
            return $resultado;
        }

        /**
         * Calcula la edad dependiendo de la fecha de nacimiento hasta hoy
         */
        public function age_func($fecha_nac){
            $dia=date("j");
            $mes=date("n");
            $anno=date("Y");
            //descomponer fecha de nacimiento
            $dia_nac=substr($fecha_nac, 8, 2);
            $mes_nac=substr($fecha_nac, 5, 2);
            $anno_nac=substr($fecha_nac, 0, 4);
            if($mes_nac>$mes){
                $calc_edad= $anno-$anno_nac-1;
            }
            else{
                if($mes==$mes_nac && $dia_nac>$dia){
                $calc_edad= $anno-$anno_nac-1; 
                }else{
                $calc_edad= $anno-$anno_nac;
                }
            }
            return $calc_edad;
        }

        public function update_person($id,$data){
                
            $this->db->query("UPDATE person SET name_person=:name,last_name_person=:last_name,age=:age,email_person=:email,phone_person=:phone,celphone_person=:celphone,address_person=:address,birth_date_person=:birth_date,identification_person=:identification WHERE id_person=:id");
            $this->db->bind(':id', $id);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':age', $this->age_func($data['birth_date']));
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':celphone', $data['celphone']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':identification', $data['identification']);

            $resultado = $this->db->execute();
            if($resultado){
                return true;
            }else{
                return false;
            }
        }
        
        public function add_person($data){
                
            $this->db->query("INSERT INTO person(name_person,last_name_person,age,email_person,phone_person,celphone_person,address_person,birth_date_person,state_person,identification_person,admission_date_person,created_at) 
            VALUES (:name,:last_name,:age,:email,:phone,:celphone,:address,:birth_date,:state,:identification,now(),now()) ");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':age',$this->age_func($data['birth_date']));
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone',$data['phone']);
            $this->db->bind(':celphone', $data['celphone']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':identification', $data['identification']);
            $this->db->bind(':state', 1);
            $result = $this->db->execute();
            
            if($result){

                $this->db->query("SELECT id_person FROM person WHERE name_person=:name AND last_name_person=:last_name AND email_person=:email AND phone_person=:phone AND celphone_person=:celphone AND birth_date_person=:birth_date AND address_person=:address");
                $this->db->bind(':name', $data['name']);
                $this->db->bind(':last_name', $data['last_name']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':phone',$data['phone']);
                $this->db->bind(':celphone', $data['celphone']);
                $this->db->bind(':address', $data['address']);
                $this->db->bind(':birth_date', $data['birth_date']);

                $result = $this->db->registerById();
                if(intval($result[0]) != 0){
                    return $result[0];
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }

        public function delete_person($id){
            $this->db->query("DELETE FROM person WHERE id_person=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }