<?php

namespace AOL\CommonBundle\Service\Notification;


interface NotificationInterface {

    public function send($message = null, $recipient = null);

    public function setMessage($message);

    public function setRecipient($recipient);

} 