<?php

    class Schedule{
        private $db;

        public function __construct(){
            // Acceso a Base de datos
            $this->db = new Base;
        }

        public function getScheduleById($id){
            $this->db->query("SELECT * FROM schedule WHERE id_schedule=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->register();
            return $result;
        }

        public function getSchedules(){
            $this->db->query("SELECT * FROM schedule");
            $result = $this->db->registers();
            return $result;
        }

        public function add_schedule($data){
            $this->db->query("INSERT INTO schedule(init_date,end_date,day_week,init_time,end_time) VALUES (:init_date,:end_date,:day_week,:init_time,:end_time)");
            $this->db->bind(':init_date', $data['init_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':day_week', $data['day_week']);
            $this->db->bind(':init_time', $data['init_time']);
            $this->db->bind(':end_time', $data['end_time']);
            $result = $this->db->execute();  
            if($result){
                $this->db->query("SELECT currval('sq_schedule')");
                
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

        public function delete_schedule($id){
            $this->db->query("DELETE FROM schedule WHERE id_schedule=:id");
            $this->db->bind(':id', $id);
            $result = $this->db->execute();  
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function update_schedule($id,$data){
            $this->db->query("UPDATE schedule SET init_date=:init_date,end_date=:end_date,day_week=:day_week,init_time=:init_time,end_time=:end_time WHERE id_schedule=:id");
            $this->db->bind(':id', $id);
            $this->db->bind(':init_date', $data['init_date']);
            $this->db->bind(':end_date', $data['end_date']);
            $this->db->bind(':day_week', $data['day_week']);
            $this->db->bind(':init_time', $data['init_time']);
            $this->db->bind(':end_time', $data['end_time']);
            $result = $this->db->execute();  
            if($result){
                return $id;
            }else{
                return 0;
            }
        }

        public function getDescriptionScheduleByRhythm($id_rhythm){
            $this->db->query("SELECT distinct rhythm.id_rhythm, rhythm.name_rhythm, class.name_class, schedule.day_week, schedule.init_time, schedule.end_time, category.name_category
            FROM class, rhythm, schedule, category WHERE class.id_rhythm =:id AND schedule.id_schedule = class.id_schedule AND category.id_category = class.id_category");
            $this->db->bind(':id', $id_rhythm);
            $result = $this->db->registers();
            return $result;
        }
    }