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
        try {
            $this->db->query(
                "SELECT I.Id, G.Voornaam, G.Achternaam
                 FROM instructeur I
                 INNER JOIN gebruiker G ON I.GebruikerId = G.Id
                 WHERE I.IsActief = 1"
            );
            return $this->db->resultSet();
        } catch (Exception $e) {
            // Log eventueel $e->getMessage()
            return [];
        }
    }

    public function isSlotTaken($datum, $tijd, $instructeurId)
    {
        try {
            $this->db->query(
                "SELECT COUNT(*) as cnt
                 FROM rijles R
                 INNER JOIN instructeur I ON R.InstructeurId = I.Id
                 WHERE R.Begindatum = :datum AND R.Begintijd = :tijd AND R.InstructeurId = :instructeurId"
            );
            $this->db->bind(':datum', $datum);
            $this->db->bind(':tijd', $tijd);
            $this->db->bind(':instructeurId', $instructeurId);
            $result = $this->db->single();
            return $result && $result->cnt > 0;
        } catch (Exception $e) {
            // Log eventueel $e->getMessage()
            return true;
        }
    }

    public function createRijles($datum, $tijd, $instructeurId)
    {
        try {
            $this->db->query(
                "INSERT INTO rijles (Begindatum, Begintijd, InstructeurId)
                 VALUES (:datum, :tijd, :instructeurId)"
            );
            $this->db->bind(':datum', $datum);
            $this->db->bind(':tijd', $tijd);
            $this->db->bind(':instructeurId', $instructeurId);
            return $this->db->execute();
        } catch (Exception $e) {
            // Log eventueel $e->getMessage()
            return false;
        }
    }

    public function getAllRijlessen()
    {
        try {
            $this->db->query(
                "SELECT r.Id, r.Begindatum, r.Begintijd, i.Id as InstructeurId, g.Voornaam, g.Achternaam
                 FROM rijles r
                 INNER JOIN instructeur i ON r.InstructeurId = i.Id
                 INNER JOIN gebruiker g ON i.GebruikerId = g.Id
                 ORDER BY r.Begindatum DESC, r.Begintijd DESC"
            );
            return $this->db->resultSet();
        } catch (Exception $e) {
            // Log eventueel $e->getMessage()
            return [];
        }
    }
}
