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

    public function addAuto($merk, $type, $kenteken, $brandstof, $opmerking = null)
    {
        $sql = "INSERT INTO auto (Merk, Type, Kenteken, Brandstof, IsActief, Opmerking) 
                VALUES (:merk, :type, :kenteken, :brandstof, 1, :opmerking)";
        $this->db->query($sql);
        $this->db->bind(':merk', $merk);
        $this->db->bind(':type', $type);
        $this->db->bind(':kenteken', $kenteken);
        $this->db->bind(':brandstof', $brandstof);
        $this->db->bind(':opmerking', $opmerking);

        try {
            return $this->db->execute();
        } catch (Exception $e) {
            return false;
        }
    }
}