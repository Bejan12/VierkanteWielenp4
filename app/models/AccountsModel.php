<?php

class AccountsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM gebruiker WHERE Gebruikersnaam = :username AND IsActief = 1";
        $this->db->query($sql);
        $this->db->bind(':username', $username, PDO::PARAM_STR);
        return $this->db->single();
    }

    public function setUserLoggedIn($userId)
    {
        $sql = "UPDATE gebruiker SET IsIngelogd = 1, Ingelogd = NOW() WHERE Id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $userId, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function getUserRole($userId)
    {
        $sql = "SELECT Naam FROM rol WHERE GebruikerId = :userId AND IsActief = 1 LIMIT 1";
        $this->db->query($sql);
        $this->db->bind(':userId', $userId, PDO::PARAM_INT);
        $result = $this->db->single();
        return $result ? $result->Naam : null;
    }

    public function getAllUsersWithEmail()
    {
        $sql = "SELECT g.Gebruikersnaam, g.Wachtwoord, g.Email
                FROM gebruiker g
                WHERE g.IsActief = 1";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function gebruikersnaamBestaat($gebruikersnaam)
    {
        $this->db->query("SELECT Id FROM gebruiker WHERE Gebruikersnaam = :gebruikersnaam");
        $this->db->bind(':gebruikersnaam', $gebruikersnaam);
        return $this->db->single() ? true : false;
    }

    public function registreerGebruiker($voornaam, $tussenvoegsel, $achternaam, $geboortedatum, $gebruikersnaam, $wachtwoord, $email)
    {
        $this->db->query("INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Gebruikersnaam, Wachtwoord, Email, IsActief) VALUES (:voornaam, :tussenvoegsel, :achternaam, :geboortedatum, :gebruikersnaam, :wachtwoord, :email, 1)");
        $this->db->bind(':voornaam', $voornaam);
        $this->db->bind(':tussenvoegsel', $tussenvoegsel);
        $this->db->bind(':achternaam', $achternaam);
        $this->db->bind(':geboortedatum', $geboortedatum);
        $this->db->bind(':gebruikersnaam', $gebruikersnaam);
        $this->db->bind(':wachtwoord', $wachtwoord);
        $this->db->bind(':email', $email);
        $result = $this->db->execute();

        if ($result) {
            $this->db->query("SELECT LAST_INSERT_ID() AS id");
            $row = $this->db->single();
            $userId = $row ? $row->id : null;
            if ($userId) {
                $this->db->query("INSERT INTO rol (GebruikerId, Naam, IsActief) VALUES (:gebruikerid, 'Leerling', 1)");
                $this->db->bind(':gebruikerid', $userId);
                $this->db->execute();
            }
        }

        return $result;
    }
}