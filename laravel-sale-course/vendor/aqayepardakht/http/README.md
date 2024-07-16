is a PHP HTTP client that makes it easy to send HTTP requests

## Installing Http

The recommended way to install Http is through
[Composer](https://getcomposer.org/).

```bash
composer require aqayepardakht/http
```

## How To Use

```php

$client = new Aqayepardakht\Http\Client();

$client->get('example.com', [
	'test' => 'test',
]);

$client->post('example.com', [
	'test' => 'test',
]);

// Send Paramas
$client->appendParams([
	'test2' => 'test2',
]);

// Append Just One Param
$client->appendParam('key', 'value');

// Empty Params And Set
$client->setParams([
	'test4' => 'test4',
	'test5' => 'test5'
]);

// Remove Param
$client->delParam('key');

// Empty Headers And Set
$client->setHeaders('key');

// Append Just One Header
$client->appendHeader('key', 'value');

$client->getUrl();

$client->setUrl('example.com');

// Set Bearer Token Header
$client->withToken('token');
```
