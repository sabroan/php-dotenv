# DotEnv
A simple and lightweight PHP .env loader.
## Installation
```
composer require env/dotenv
```
## Usage
The .env file should have a valid [.ini](https://wikipedia.org/wiki/INI_file) syntaxis.
### Load
```php
$env = new \Env\Dotenv('.env');
```
The second argument can be passed, in case, if $_ENV existing keys should be overwritten.
```php
$env = new \Env\Dotenv('.env', true);
```
### Get value
#### Instance `get`
```php
$env = new \Env\Dotenv('.env');
$value = $env->get('value');
```
#### Static `get`
```php
(new \Env\Dotenv('.env'));
$value = \Env\Dotenv:get('value');
```
#### `$_ENV`
```php
(new \Env\Dotenv('.env'));
$value = $_ENV['value'];
```