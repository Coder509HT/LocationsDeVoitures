<?php

class RentsModel extends Database
{
    public function getLocations()
    {
        $sql = 'SELECT * FROM locations';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
