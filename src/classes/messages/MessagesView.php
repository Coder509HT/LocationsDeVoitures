<?php

class MessagesView extends MessagesModel
{
    public function messagesList()
    {
        return $this->getMessages();
    }
}
