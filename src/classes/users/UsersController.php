<?php

class UsersController extends UsersModel
{
    public function createAccount($user)
    {
        return $this->addUser($user->username, $user->password);
    }

    public function updateUserConnect($status, $lastLogin, $id)
    {
        $this->setUserConnectInfos($status, $lastLogin, $id);
    }
}
