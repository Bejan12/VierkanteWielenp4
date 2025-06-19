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
}