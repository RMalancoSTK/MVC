<?php

class Database
{
    public $db;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        // connect to database
        // $this->connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        // if ($this->connection->connect_errno) {
        //     echo "Failed to connect to MySQL: " . $this->connection->connect_error;
        //     exit();
        // }
        // $this->connection->set_charset(CHARSET);
        // return $this->connection;
        $this->db = new mysqli(HOST, USER, PASSWORD, DATABASE);
        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
            exit();
        }
        $this->db->set_charset(CHARSET);
        return $this->db;
    }

    public function disconnect()
    {
        // disconnect from database
        $this->db->close();
    }
}
