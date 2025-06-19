<?php

class RijlesModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllInstructeurs()
    {
        $this->db->query("SELECT I.Id, G.Voornaam, G.Achternaam FROM instructeur I
                          JOIN gebruiker G ON I.GebruikerId = G.Id
                          WHERE I.IsActief = 1");
        return $this->db->resultSet();
    }

    public function isSlotTaken($datum, $tijd, $instructeurId)
    {
        $this->db->query("SELECT COUNT(*) as cnt FROM rijles
                          WHERE Begindatum = :datum AND Begintijd = :tijd AND InstructeurId = :instructeurId");
        $this->db->bind(':datum', $datum);
        $this->db->bind(':tijd', $tijd);
        $this->db->bind(':instructeurId', $instructeurId);
        $result = $this->db->single();
        return $result && $result->cnt > 0;
    }

    public function createRijles($datum, $tijd, $instructeurId)
    {
        $this->db->query("INSERT INTO rijles (Begindatum, Begintijd, InstructeurId) VALUES (:datum, :tijd, :instructeurId)");
        $this->db->bind(':datum', $datum);
        $this->db->bind(':tijd', $tijd);
        $this->db->bind(':instructeurId', $instructeurId);
        return $this->db->execute();
    }

    public function getAllRijlessen()
    {
        $this->db->query(
            "SELECT r.Id, r.Begindatum, r.Begintijd, i.Id as InstructeurId, g.Voornaam, g.Achternaam
             FROM rijles r
             LEFT JOIN instructeur i ON r.InstructeurId = i.Id
             LEFT JOIN gebruiker g ON i.GebruikerId = g.Id
             ORDER BY r.Begindatum DESC, r.Begintijd DESC"
        );
        return $this->db->resultSet();
    }
}
