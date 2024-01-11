<?php
    /**
     * Esta clase se encarga de la conexion a la base de datos.
     * INSERTA DATOS 
     * 
     * 1. funcion conectar(): realizar una conexion a la base de datos. 
     * 2. funcion desconectar() : realiza la desconexion a la base de datos.
     * 
     * - ¿De que forma realizamos la configuracion de la conexion a la base de datos?
     *  + nombre base de datos
     *  + ubicacion de la BD
     *  + puerto de la DB
     *  + usuario
     *  + password
     */

     class Database {

        /**
         * Realiza la conexion a la base de datos
         */
        public static function conectar() : PDO{
            $db = new \PDO('sqlite:db/db.sqlite', '', '', array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
             ));
             /******************************************************************** */
            //self::iniciarTablas($db);
             //self::delete($db);
            //self::historial($db);
            return $db;
        }

        /**
         * Realiza la desconexion a la base de datos
         */
        public static function desconectar(){
            return null;
        }

        /**
         * Funcion de prueba para iniciar una tabla con contenido.
         */
        public static function iniciarTablas($db) : void{
             $delete = "
                 DROP TABLE IF EXISTS users;
             ";

             $db->exec($delete);

            $query = "
                CREATE TABLE IF NOT EXISTS users(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    email TEXT,
                    password TEXT,
                    rol_id INTEGER
                )
            ";

            $db->exec($query);

            $query = "
                CREATE TABLE IF NOT EXISTS rol(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT
                )
            ";

            $db->exec($query);

            $query = "
                INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
            ";

            $db->exec($query);
        




        /**
         * CREACION JUGUETES 
         */

         
         $query = "
         CREATE TABLE juguetes (
            id_juguete INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT,
            descripcion TEXT,
            precio FLOAT,
            edad_recomendada INTEGER,
            stock INTEGER,
            ean INTEGER
        )
        ";

        $db->exec($query);
         

         $query = "
         INSERT INTO juguetes (nombre, descripcion, precio, edad_recomendada, stock, ean) 
         VALUES 
             ('Osito de Peluche', 'Suave y adorable osito de peluche.', 19.99, 2, 50, 9788408280170 ),
             ('Bloques de Construcción', 'Set de bloques para construir estructuras creativas.', 29.99, 3, 30, 9788408280170),
             ('Libro Educativo', 'Libro interactivo con actividades educativas para niños pequeños.', 14.99, 1, 40, 9788408280170);
              ";

        $db->exec($query);

       
        }
        public static function delete($db){
            $query = "
                DROP TABLE IF EXISTS users;

            ";
            $delete = "
            DROP TABLE IF EXISTS users;
        ";

        $db->exec($delete);

       $query = "
           CREATE TABLE IF NOT EXISTS users(
               id INTEGER PRIMARY KEY AUTOINCREMENT,
               email TEXT,
               password TEXT,
               rol_id INTEGER
           )
       ";

       $db->exec($query);

       $query = "
           CREATE TABLE IF NOT EXISTS rol(
               id INTEGER PRIMARY KEY AUTOINCREMENT,
               nombre TEXT
           )
       ";

       $db->exec($query);

       $query = "
           INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
       ";

       $db->exec($query);
            $filas = $db->exec($query);
        }

        // public static function insert($db, $nombre, $email, $edad) : void{
        //     $query = "
        //         INSERT INTO users (nombre, email, edad) VALUES 
        //         ('$nombre', '$email', $edad);
        //     ";

        //     $db->exec($query);
        // }

        // public static function select($db) : PDOStatement{ean
        //         SELECT * FROM users;
        //     ";

        //     $result = $db->query($query);
        //     return $result;
        // }
        public static function historial($db) : void{        
            // Creación de la tabla vendidos
            $delete = "
            DROP TABLE IF EXISTS vendidos;
        ";

        $db->exec($delete);
            $query = "
                CREATE TABLE IF NOT EXISTS vendidos (
                    id_venta INTEGER PRIMARY KEY AUTOINCREMENT,
                    id_juguete INTEGER,
                    edad_recomendada INTEGER,
                    cantidad INTEGER,
                    precio_total FLOAT,
                    precio FLOAT,
                    email TEXT,
                    nombre TEXT,
                    ean INTEGER,
                    fecha_venta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY(id_juguete) REFERENCES juguetes(id_juguete)
                )
            ";
        
            $db->exec($query);
        }
        
}  
?>
