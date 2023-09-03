<?php

class DB{
    private static $hostname = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "nilai_siswa";

    public static $conn;
    public static function connect(){
        self::$conn = mysqli_connect(self::$hostname, self::$username, self::$password, self::$database);

        return self::$conn;
    } 

}

?>