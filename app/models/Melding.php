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
}
