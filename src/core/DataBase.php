<?php

class DataBase {
    private static $hostname;
    private static $username;
    private static $password;
    private static $dbname;

    private static $conn;
    private static $instance;
    private static $result;

    private function __construct() {}
    
    public function createConnection($hostname, $username, $password, $dbname) {
        self::$hostname = $hostname;
        self::$username = $username;
        self::$password = $password;
        self::$dbname = $dbname;
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DataBase();
        }

        return self::$instance;
    }

    public static function connect() {
        self::$conn = mysqli_connect(self::$hostname, self::$username, self::$password, self::$dbname);
    }

    public function getConnection()
    {
        return self::$conn;
    }

    public function closeConnection()
    {
        self::$conn->close();
    }

    public function query($query, $type = "", $parameters = []) {
        self::connect();
        $stmt = mysqli_prepare(self::$conn, $query);
        if ($type != "" or $parameters != []) {
            $stmt->bind_param($type, ...$parameters);
        }
        $stmt->execute();
        self::$result = $stmt->get_result();
        $stmt->close();
        self::$conn->close();
    }

    public function queryNew($query, $type = "", $parameters = []) {
        $stmt = mysqli_prepare(self::$conn, $query);
        if ($type != "" or $parameters != []) {
            $stmt->bind_param($type, ...$parameters);
        }
        $stmt->execute();
        self::$result = $stmt->get_result();
        $stmt->close();
    }

    public function getAll() {
        $data = [];
        while ($row = mysqli_fetch_assoc(self::$result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getFirst() {
        return mysqli_fetch_assoc(self::$result);
    }



}

$DB = DataBase::getInstance();