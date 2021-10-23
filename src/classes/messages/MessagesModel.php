<?php

class MessagesModel extends Database
{
    protected function getMessages()
    {
        $sql = 'SELECT 
                Messages.id,
                Messages.message,
                Messages.dateEnvoie,
                Messages.idUtilisateur,
                Utilisateurs.pseudo
            FROM messages
            JOIN utilisateurs
            ON Messages.idUtilisateur = Utilisateurs.id
            ORDER BY Messages.id ASC
        ';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function addMessage($idUtilisateur, $message, $dateEnvoie)
    {
        $sql = 'INSERT INTO messages(idUtilisateur, message, dateEnvoie) VALUES(:idUtilisateur, :message, :dateEnvoie)';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['idUtilisateur' => $idUtilisateur, 'message' => $message, 'dateEnvoie' => $dateEnvoie]);
    }
}
