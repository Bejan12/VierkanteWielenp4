<?php

class AutoModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllAutos()
    {
        $sql = "SELECT Id, Merk, Type, Kenteken, Brandstof FROM auto WHERE IsActief = 1";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}