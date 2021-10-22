<?php

class ModeleVoitures extends Database
{
    public function getVoitures()
    {
        $sql = 'SELECT * FROM voitures';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
