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
}