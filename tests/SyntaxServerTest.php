<?php

class SyntaxServerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test credentials crypt.
     */
    public function testAuthEncryption()
    {
        $username = 'root@example.com';
        $password = 'secret_password';
        $server = new \SyntaxErro\SyntaxServer($username, $password);
        $this->assertEquals(base64_decode($server->getUsername()), $username, sprintf("Username '%s' crypt is not base64.", $username));
        $this->assertEquals(base64_decode($server->getPassword()), $password, sprintf("Password '%s' crypt is not base64.", $username));
    }

    /**
     * @throws \SyntaxErro\SmtpBundle\SmtpException
     * @expectedException \SyntaxErro\SmtpBundle\SmtpException
     */
    public function testInvalidUserCredentials()
    {
        $server = new \SyntaxErro\SyntaxServer("root@example.com", "secret_password");

        $email = new \SyntaxErro\SmtpBundle\SyntaxEmail("whatever@example.com", "Test content.");
        $server->send($email);
    }
}
