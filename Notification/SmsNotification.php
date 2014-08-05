<?php

namespace AOL\CommonBundle\Service\Notification;


use AOL\CommonBundle\Service\Notification\Exception\Exception;

class SmsNotification implements NotificationInterface {

    public $message;

    protected $twilioClient;

    protected $recipient;

    protected $sender;

    public function __construct($sid, $token, $sender) {
        $this->sender = $sender;
        $this->twilioClient = new \Services_Twilio($sid, $token);
    }

    public function send($message = null, $recipient = null)
    {
        if (!is_null($message)) {
            $this->setMessage($message);
        } else if (is_null($this->message)) {
            throw new Exception('Undefined message');
        }

        if (!is_null($recipient)) {
            $this->setRecipient($recipient);
        } else if (is_null($this->recipient)) {
            throw new Exception('Undefined recipient');
        }

        $message = $this->twilioClient->account->messages->sendMessage(
            $this->sender,
            $this->recipient,
            $this->message
        );

        return $message->sid;
    }


    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setRecipient ($recipient) {
        $this->recipient = $recipient;
    }
}