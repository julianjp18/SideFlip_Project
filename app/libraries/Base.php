<?php
    // clase para conectarse a la base de datos y ejecutr consultas
    class Base{
        
        private $host = DB_HOST;
        private $dbuser = DB_USER;
        private $dbpass = DB_PASSWORD;
        private $dbname = DB_NAME;
        
        private $dbh; // database handler
        private $stmt; 
        private $error;

        public function __construct(){
            
            
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );


            // Crear instancias de PDO
            try{
                $this->dbh = $dbh = new PDO("pgsql:host=".$this->host.";port=5432;dbname=".$this->dbname, $this->dbuser, $this->dbpass,$opciones); 
                //$this->dbh->Exec('set name utf8');
            }catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // se prepara la consulta
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        // se vincula la consulta al bind PDO
        public function bind($parametro,$valor,$tipo = null){
            if(is_null($tipo)){
                switch (true){
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;
                    default:
                        $tipo = PDO::PARAM_STR;
                    break;
                    }
            }
            $this->stmt->bindvalue($parametro,$valor,$tipo);
        }

        // Ejecuta la consulta
        public function execute(){
            return $this->stmt->execute();
        }

        // Obtiene los registros
        public function registros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Obtiene un solo registro porId 
        public function registroPorId(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_NUM);
        }

        // Obtiene un solo registro
        public function registro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        // Obtiene cantidad de filas con el método rowCount
        // Ejecuta la consulta
        public function rowCount(){
            return $this->stmt->rowCount();
        }
    }