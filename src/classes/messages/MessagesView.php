<?php

class MessagesView extends MessagesModel
{
    public function messagesListe()
    {
        return $this->getMessages();
    }
}
