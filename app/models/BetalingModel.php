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
        $this->db->query("SELECT Id AS id, FactuurId AS factuur_id, Datum AS datum, Status AS status, IsActief AS actief, (SELECT BedragIncBtw FROM factuur WHERE factuur.Id = betaling.FactuurId) AS bedrag FROM betaling WHERE FactuurId = :factuurId");
        $this->db->bind(':factuurId', $factuurId);
        return $this->db->resultSet();
    }
}
