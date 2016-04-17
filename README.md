# PHP SDK for [syntax-shell.me](https://syntax-shell.me) mail server API

### Installation
```
composer require syntaxerro/mail-api-sdk
```

### Test
```
phpunit --bootstrap=vendor/autoload.php tests/ 
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
$message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Hello. I'm testing your API.", "recipient@example.com");

/* Set subject of message */
$message->setSubject("It's a test message!");

/* Set reply-to header. */
$message->setReplyTo("other@email.com");

/* Set my full name displayed instead of emails address. */
$message->setAs("Darth Vader");

/* Send message. */
$server->send($message);
```

##### Multiple recipients
```php
$message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Hello. I'm testing your API.", ["recipient@example.com", "other@recipient.com"]);
```

or

```php
$message = new \SyntaxErro\SmtpBundle\SyntaxEmail("Hello. I'm testing your API.");
$message
    ->addRecipient("recipient@example.com")
    ->addRecipient("other@recipient.com");
```
