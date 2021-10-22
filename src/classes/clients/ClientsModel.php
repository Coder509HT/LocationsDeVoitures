<?php

class ClientsModel extends Database
{
    public function getClients()
    {
        $sql = 'SELECT * FROM clients';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
