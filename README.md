# Silex JSON Api

JSONApi.org implementation for Silex framework.

Based on Nil Portugués Caldero PHP Json Api Package [php-json-api](http://github.com/nilportugues/php-json-api).

## Installation

** Step 1: Download Service Provider

To install with [composer](http://getcomposer.org) just open a terminal and type:

```bash
$ composer require mauro-moreno/silex-jsonapi
```

** Step 2: Enable Service Provider

To enable 

```php
<?php
$app = new Silex\Application;
$app['mappers'] = []; // Array of mapping classes
$app->register(new MauroMoreno\JsonApi\JsonApiServiceProvider);
```

## Controller

The following `JsonApiResponseTrait` methods are provided to return the right headers and HTTP status codes are available:

```php
    private function resourceCreated($json);
    private function resourceDeleted($json);
    private function resourceNotFound($json);
    private function resourceProcessing($json);
    private function resourceUpdatedResponse($json);
    private function response($json);
    private function unsupportedAction($json);
```    