<?php
class MessagesController extends MessagesModel
{
    public function createMessage($message)
    {
        $this->addMessage($message->idUtilisateur, $message->message, $message->dateEnvoie);
    }
}
