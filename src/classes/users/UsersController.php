<?php

class UsersController extends UsersModel
{
    public function createAccount($user)
    {
        return $this->addUser($user->username, $user->password);
    }

    public function updateStatusUser($status, $id)
    {
        $this->setUserStatus($status, $id);
    }
}
