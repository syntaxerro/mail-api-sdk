<?php

class SyntaxEmailTest extends PHPUnit_Framework_TestCase
{
   public function testCreateEmailWithOneRecipientByConstruct()
   {
       $testedAddress = "test@recipient.com";
       $message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Whatever.", $testedAddress);
       $this->assertTrue(is_array($message->getTo()), "Message recipients is not array.");
       $this->assertContains($testedAddress, $message->getTo(), "Message recipients not contain address passed by construct.");
   }

    public function testCreateEmailWithMultipleRecipientsByConstruct()
    {
        $testedAddresses = ["test@recipient.com", "other@address.com"];
        $message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Whatever.", $testedAddresses);
        $this->assertTrue(is_array($message->getTo()), "Message recipients is not array.");
        $this->assertEquals($testedAddresses, $message->getTo(), "Message recipients not contain addresses passed by construct.");
    }

    public function testCreateEmailWithManualAddingRecipients()
    {
        $testedAddresses = ["test@recipient.com", "other@address.com"];
        $message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Whatever.");
        foreach($testedAddresses as $testedAddress) $message->addRecipient($testedAddress);
        $this->assertTrue(is_array($message->getTo()), "Message recipients is not array.");
        $this->assertEquals($testedAddresses, $message->getTo(), "Message recipients not contain addresses passed by construct.");
    }
}
