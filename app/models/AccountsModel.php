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
        $sql = "SELECT g.Gebruikersnaam, g.Wachtwoord, c.Email 
                FROM gebruiker g
                LEFT JOIN contact c ON c.GebruikerId = g.Id
                WHERE g.IsActief = 1";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}