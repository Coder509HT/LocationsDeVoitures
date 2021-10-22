<?php

class UsersModel extends Database
{
    /* GET DATA */
    protected function getUsers()
    {
        $sql = 'SELECT * FROM utilisateurs';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function getUserById($id)
    {
        $sql = 'SELECT * FROM utilisateurs WHERE id = :id';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    protected function getUserInfos($pseudo, $motDePasse)
    {
        $sql = 'SELECT id, pseudo FROM utilisateurs WHERE pseudo = :pseudo AND motDePasse = :motDePasse';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo, 'motDePasse' => $motDePasse]);
        return ['user' => $stmt->fetch(), 'status' => ($stmt->rowCount() > 0)];
    }

    protected function usernameExist($pseudo)
    {
        $sql = 'SELECT * FROM utilisateurs WHERE pseudo = :pseudo';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo]);
        $stmt->fetchAll();
        return ($stmt->rowCount() > 0);
    }

    /* UPDATE DATA */
    protected function addUser($pseudo, $motDePasse)
    {
        $sql = 'INSERT INTO utilisateurs(pseudo, motDePasse) VALUES(:pseudo, :motDePasse)';
        $stmt = $this->getConnection()->prepare($sql);
        return $stmt->execute(['pseudo' => $pseudo, 'motDePasse' => $motDePasse]);
    }

    protected function updateUser($pseudo, $motDePasse, $id)
    {
        $sql = 'UPDATE utilisateurs SET pseudo = :pseudo, motDePasse = :motDePasse WHERE id = :id';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo, 'motDePasse' => $motDePasse, 'id' => $id]);
    }

    protected function setUserStatus($status, $id)
    {
        $sql = 'UPDATE utilisateurs SET login = :status WHERE id = :id';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['status' => $status, 'id' => $id]);
    }

    protected function deleteUser($id)
    {
        $sql = 'DELETE FROM utilisateurs WHERE id = :id';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
