<?php

class MessagesModel extends Database
{
    public function getMessages()
    {
        $sql = 'SELECT * FROM messages';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
