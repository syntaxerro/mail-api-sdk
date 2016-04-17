# PHP SDK for [syntax-shell.me](https://syntax-shell.me) mail server API

### Installation
```
composer require syntaxerro/mail-api-sdk
```

### Usage
```php
require __DIR__.'/src/SyntaxErro/SyntaxServer.php';
require __DIR__.'/src/SyntaxErro/SmtpBundle/SyntaxEmail.php';
require __DIR__.'/src/SyntaxErro/SmtpBundle/SmtpException.php';
// or use composer for auto-loading

/* Login using email address and password. */
$server = new \SyntaxErro\SyntaxServer("smtp@sntx.ml", "smtp-api-sdk");

/* Create new message to recipient@example.com with content. */
$message = new \SyntaxErro\SmtpBundle\SyntaxEmail("recipient@example.com", "Hello. I'm testing your API.");

/* Set subject of message */
$message->setSubject("It's a test message!");

/* Set reply-to header. */
$message->setReplyTo("other@email.com");

/* Set my full name displayed instead of emails address. */
$message->setAs("Darth Vader");

/* Send message. */
$server->send($message);
```
