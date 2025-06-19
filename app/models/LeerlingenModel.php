<?php

class LeerlingenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Deze methode haalt alle leerlingen records op uit de database
     */
    public function getAllLeerlingen()
    {
        $sql = 'SELECT  l.Id, 
                        l.Relatienummer AS Klas, 
                        CONCAT(g.Voornaam, " ", IFNULL(g.Tussenvoegsel, ""), " ", g.Achternaam) AS Naam, 
                        g.Geboortedatum AS Leeftijd, 
                        c.Email 
                FROM leerling l
                JOIN gebruiker g ON l.GebruikerId = g.Id
                LEFT JOIN contact c ON g.Id = c.GebruikerId
                ORDER BY g.Voornaam ASC';

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    /**
     * Controleert of een e-mailadres al bestaat in de database
     */
    public function emailExists($email)
    {
        $sql = 'SELECT COUNT(*) AS count FROM contact WHERE Email = :email';
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result->count > 0;
    }

    public function addLeerling($data)
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

            // Fetch the highest existing Relatienummer and calculate the next one
            $sql = 'SELECT MAX(CAST(SUBSTRING(Relatienummer, 3) AS UNSIGNED)) AS MaxNummer FROM leerling';
            $maxNummer = $this->db->outQuery($sql)->fetchColumn();
            $nextNummer = $maxNummer ? $maxNummer + 1 : 4; // Start at RL004 if no records exist
            $relatienummer = 'RL' . str_pad($nextNummer, 3, '0', STR_PAD_LEFT);

            $sql = 'INSERT INTO leerling (GebruikerId, Relatienummer, IsActief, DatumAangemaakt, DatumGewijzigd) 
                    VALUES (:gebruikerId, :relatienummer, 1, NOW(), NOW())';

            $this->db->query($sql);
            $this->db->bind(':gebruikerId', $gebruikerId);
            $this->db->bind(':relatienummer', $relatienummer);

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
}
