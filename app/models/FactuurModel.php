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
<<<<<<< HEAD
        $this->db->query("SELECT factuur.Id AS id, Factuurdatum AS datum, BedragIncBtw AS totaal, Factuurstatus AS status, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id ORDER BY datum DESC");
=======
        $this->db->query("SELECT factuur.Id AS id, factuur.Factuurnummer AS nummer, Factuurdatum AS datum, BedragIncBtw AS totaal, Factuurstatus AS status, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id ORDER BY factuur.Id DESC");
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
        return $this->db->resultSet();
    }

    public function getFactuurById($id)
    {
<<<<<<< HEAD
        $this->db->query("SELECT factuur.Id AS id, factuur.Factuurdatum AS datum, factuur.BedragIncBtw AS totaal, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id WHERE factuur.Id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
=======
        $this->db->query("SELECT factuur.Id AS id, factuur.Factuurnummer AS nummer, factuur.Factuurdatum AS datum, factuur.BedragIncBtw AS totaal, CONCAT(gebruiker.Voornaam, ' ', gebruiker.Achternaam) AS klant_naam FROM factuur INNER JOIN gebruiker ON factuur.InschrijvingId = gebruiker.Id WHERE factuur.Id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function createFactuur($datum, $bedrag, $status, $inschrijvingId)
    {
        // Bepaal het hoogste huidige factuurnummer
        $this->db->query("SELECT Factuurnummer FROM factuur ORDER BY Id DESC LIMIT 1");
        $last = $this->db->single();
        if ($last && preg_match('/^F(\d{4})(\d{3})$/', $last->Factuurnummer, $matches)) {
            $jaar = date('Y');
            $volgnummer = (int)$matches[2];
            if ($matches[1] == $jaar) {
                $volgnummer++;
            } else {
                $volgnummer = 1;
            }
        } else {
            $jaar = date('Y');
            $volgnummer = 1;
        }
        $factuurnummer = 'F' . $jaar . str_pad($volgnummer, 3, '0', STR_PAD_LEFT);

        $this->db->query("INSERT INTO factuur (Factuurnummer, Factuurdatum, BedragIncBtw, Factuurstatus, InschrijvingId) VALUES (:factuurnummer, :datum, :bedrag, :status, :inschrijvingId)");
        $this->db->bind(':factuurnummer', $factuurnummer);
        $this->db->bind(':datum', $datum);
        $this->db->bind(':bedrag', $bedrag);
        $this->db->bind(':status', $status);
        $this->db->bind(':inschrijvingId', $inschrijvingId);
        return $this->db->execute();
    }

    public function isBetalingGeregistreerd($factuurId)
    {
        $this->db->query("SELECT COUNT(*) as aantal FROM betaling WHERE FactuurId = :factuurId");
        $this->db->bind(':factuurId', $factuurId);
        $row = $this->db->single();
        return $row && $row->aantal > 0;
    }

    public function getInschrijvingen()
    {
        $this->db->query("SELECT Id, CONCAT(Voornaam, ' ', Achternaam) AS naam FROM gebruiker ORDER BY Voornaam");
        return $this->db->resultSet();
    }

    public function factuurBestaatVoorInschrijving($inschrijvingId)
    {
        $this->db->query("SELECT Id FROM factuur WHERE InschrijvingId = :inschrijvingId");
        $this->db->bind(':inschrijvingId', $inschrijvingId);
        return $this->db->single() ? true : false;
    }
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
}
