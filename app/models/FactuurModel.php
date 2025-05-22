<?php
class FactuurModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getFacturen()
    {
        $this->db->query("SELECT factuur.Id AS id, Factuurdatum AS datum, BedragIncBtw AS totaal, Factuurstatus AS status, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id ORDER BY datum DESC");
        return $this->db->resultSet();
    }

    public function getFactuurById($id)
    {
        $this->db->query("SELECT factuur.Id AS id, factuur.Factuurdatum AS datum, factuur.BedragIncBtw AS totaal, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id WHERE factuur.Id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
