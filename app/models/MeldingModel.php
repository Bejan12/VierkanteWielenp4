<?php
class MeldingModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getMeldingen()
    {
        $this->db->query("SELECT Id AS id, Bericht AS beschrijving, Datum AS datum, IsActief AS actief FROM melding");
        return $this->db->resultSet();
    }

    public function getMeldingenByDatum($datum)
    {
        $this->db->query("SELECT Id AS id, Bericht AS beschrijving, Datum AS datum, IsActief AS actief FROM melding WHERE Datum = :datum");
        $this->db->bind(':datum', $datum);
        return $this->db->resultSet();
    }
<<<<<<< HEAD
=======

    public function createMelding($beschrijving, $datum, $actief)
    {
        $this->db->query("INSERT INTO melding (Bericht, Datum, IsActief) VALUES (:beschrijving, :datum, :actief)");
        $this->db->bind(':beschrijving', $beschrijving);
        $this->db->bind(':datum', $datum);
        $this->db->bind(':actief', $actief);
        return $this->db->execute();
    }

    public function meldingBestaat($beschrijving, $datum)
    {
        $this->db->query("SELECT Id FROM melding WHERE Bericht = :beschrijving AND Datum = :datum");
        $this->db->bind(':beschrijving', $beschrijving);
        $this->db->bind(':datum', $datum);
        return $this->db->single() ? true : false;
    }
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
}
