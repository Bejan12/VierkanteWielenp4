<?php
class BetalingModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getBetalingenByFactuurId($factuurId)
    {
<<<<<<< HEAD
        $this->db->query("SELECT Id AS id, FactuurId AS factuur_id, Datum AS datum, Status AS status, IsActief AS actief, (SELECT BedragIncBtw FROM factuur WHERE factuur.Id = betaling.FactuurId) AS bedrag FROM betaling WHERE FactuurId = :factuurId");
        $this->db->bind(':factuurId', $factuurId);
        return $this->db->resultSet();
    }
}
=======
        $this->db->query("SELECT Id AS id, FactuurId AS factuur_id, Datum AS datum, Bedrag AS bedrag, Status AS status, IsActief AS actief FROM betaling WHERE FactuurId = :factuurId");
        $this->db->bind(':factuurId', $factuurId);
        return $this->db->resultSet();
    }

    public function createBetaling($factuurId, $datum, $bedrag, $status, $actief)
    {
        $this->db->query("INSERT INTO betaling (FactuurId, Datum, Bedrag, Status, IsActief) VALUES (:factuurId, :datum, :bedrag, :status, :actief)");
        $this->db->bind(':factuurId', $factuurId);
        $this->db->bind(':datum', $datum);
        $this->db->bind(':bedrag', $bedrag);
        $this->db->bind(':status', $status);
        $this->db->bind(':actief', $actief);
        return $this->db->execute();
    }
}
// Alles is correct voor betalingen ophalen en toevoegen
>>>>>>> b429e29 (Mijn wijzigingen toegevoegd aan main branch)
