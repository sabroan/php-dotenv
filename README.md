# Dotenv
A simple and tiny PHP `.env` loader.
## Installation
```
composer require env/dotenv
```
## Usage
The .env file should have a valid [.ini](https://wikipedia.org/wiki/INI_file) syntaxis, supported by [parse_ini_file](https://www.php.net/manual/en/function.parse-ini-file.php).
### Load
Parse .env and inject it into `$_ENV` variable:
```php
$env = new \Env\Dotenv(
    path: '.env',
    overwrite: false, // by default: true
);
```
The second argument determine if existing `$_ENV` keys should be overwritten.
### Parse
Additionaly, if you dont wan't to inject data into `$_ENV`, you can retrieve parsed data by:
```php
$env = \Env\Dotenv::load('.env');
```