<?php
    class DBConnexion {
        public static $conn;

        public static function getConnexion(){
            if(self::$conn) return self::$conn;

            $servername = "localhost";
            $database = "facechat";
            $username = "root";
            $password = "";
            self::$conn = new mysqli($servername, $username, $password, $database);
            

            return self::$conn;
        }
    }

?>