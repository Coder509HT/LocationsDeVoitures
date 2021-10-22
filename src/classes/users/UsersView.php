<?php

class UsersView extends UsersModel
{
    public function usersList()
    {
        return $this->getUsers();
    }

    public function usernameTaken($username)
    {
        return $this->usernameExist($username);
    }

    public function getUser($username, $password)
    {
        return (object)$this->getUserInfos($username, $password);
    }
}
