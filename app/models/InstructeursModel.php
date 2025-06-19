<?php

class InstructeursModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Deze methode haalt alle instructeurs records op uit de database
     */
    public function getAllInstructeurs()
    {
        $sql = 'SELECT  i.Id, 
                        CONCAT(g.Voornaam, " ", IFNULL(g.Tussenvoegsel, ""), " ", g.Achternaam) AS Naam, 
                        g.Geboortedatum AS Leeftijd, 
                        i.Nummer AS Instructeursnummer, 
                        c.Email 
                FROM instructeur i
                JOIN gebruiker g ON i.GebruikerId = g.Id
                LEFT JOIN contact c ON g.Id = c.GebruikerId
                ORDER BY g.Voornaam ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function addInstructeur($data)
    {
        $sql = 'INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, IsActief, DatumAangemaakt, DatumGewijzigd) 
                VALUES (:voornaam, :tussenvoegsel, :achternaam, :geboortedatum, 1, NOW(), NOW())';

        $this->db->query($sql);
        $this->db->bind(':voornaam', $data['voornaam']);
        $this->db->bind(':tussenvoegsel', $data['tussenvoegsel']);
        $this->db->bind(':achternaam', $data['achternaam']);
        $this->db->bind(':geboortedatum', $data['geboortedatum']);

        if ($this->db->execute()) {
            $gebruikerId = $this->db->outQuery('SELECT LAST_INSERT_ID()')->fetchColumn();

            // Fetch the highest existing instructeursnummer and calculate the next one
            $sql = 'SELECT MAX(CAST(SUBSTRING(Nummer, 3) AS UNSIGNED)) AS MaxNummer FROM instructeur';
            $maxNummer = $this->db->outQuery($sql)->fetchColumn();
            $nextNummer = $maxNummer ? $maxNummer + 1 : 1;
            $instructeursnummer = 'IN' . str_pad($nextNummer, 3, '0', STR_PAD_LEFT);

            $sql = 'INSERT INTO instructeur (GebruikerId, Nummer, IsActief, DatumAangemaakt, DatumGewijzigd) 
                    VALUES (:gebruikerId, :nummer, 1, NOW(), NOW())';

            $this->db->query($sql);
            $this->db->bind(':gebruikerId', $gebruikerId); 
            $this->db->bind(':nummer', $instructeursnummer);

            if ($this->db->execute()) {
                $sql = 'INSERT INTO contact (GebruikerId, Email, IsActief, DatumAangemaakt, DatumGewijzigd) 
                        VALUES (:gebruikerId, :email, 1, NOW(), NOW())';

                $this->db->query($sql);
                $this->db->bind(':gebruikerId', $gebruikerId);
                $this->db->bind(':email', $data['email']);

                return $this->db->execute();
            }
        }

        return false;
    }

    public function emailExists($email)
    {
        $sql = 'SELECT COUNT(*) AS count FROM contact WHERE Email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result->count > 0;
    }
}