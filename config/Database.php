<?php

class Database {
    private $dbConnect =  null;

    private $DB_HOST = 'localhost';
    private $DB_PORT = 3306;
    private $DB_DATABASE = 'test_generator';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = 'password';

    public function __construct()
    {
        $host     = $this->DB_HOST;
        $port     = $this->DB_PORT;
        $db       = $this->DB_DATABASE;
        $user     = $this->DB_USERNAME;
        $password = $this->DB_PASSWORD;        

        try {
            $this->dbConnect = new mysqli($host, $user, $password, $db, $port);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function connect()
    {
        return $this->dbConnect;
    }
}
