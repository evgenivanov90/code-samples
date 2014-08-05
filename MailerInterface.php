<?php
namespace AOL\MailerBundle\Service;

interface MailerInterface {

    public function doSendMail($scheduleId, $campaignId, $paramsList, $tplParagraphs, $subject, $shiftedSendingData);

    public function getMailingReport($mailingId);

    public function getOptout($mailingId);

    public function clearData($userListId, $mailingTpl);

    public function getBounces($mailingId);

}