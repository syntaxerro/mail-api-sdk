<?php

class SyntaxEmailTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test adding recipients by construct.
     *
     * @param $testedAddresses
     * @dataProvider testCreateEmailWithRecipientsByConstructProvider
     */
    public function testCreateEmailWithRecipientsByConstruct($testedAddresses)
    {
        $message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Whatever.", $testedAddresses);
        $this->assertTrue(is_array($message->getTo()), "Message recipients is not array.");

        if(is_array($testedAddresses)) {
            foreach($testedAddresses as $testedAddress) {
                $this->assertContains($testedAddress, $message->getTo(), sprintf("Message recipients not contain added '%s' address.", $testedAddress));
            }
        } else {
            $this->assertContains($testedAddresses, $message->getTo(), "Message recipients not contain '$testedAddresses' address passed by construct.");
        }

    }

    /**
     * Add one recipient as string
     * or multiple recipients as array of strings.
     *
     * @return array
     */
    public function testCreateEmailWithRecipientsByConstructProvider()
    {
        return [
            ["test@address.com"],
            [["test@address.com", "other@address.com"]]
        ];
    }

    /**
     * Test manual adding of recipients in loop.
     */
    public function testCreateEmailWithManualAddingRecipients()
    {
        $testedAddresses = ["test@recipient.com", "other@address.com"];
        $message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Whatever.");
        foreach($testedAddresses as $testedAddress) $message->addRecipient($testedAddress);
        $this->assertTrue(is_array($message->getTo()), "Message recipients is not array.");
        $this->assertEquals($testedAddresses, $message->getTo(), "Message recipients not contain addresses passed by construct.");
    }
}
