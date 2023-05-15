<?php

declare(strict_types=1);

namespace Env;

use \ErrorException;
use \ValueError;

use function \realpath;
use function \parse_ini_file;

use const \INI_SCANNER_TYPED;

final class Dotenv
{
    /**
     * @param string $path      path to .env file.
     * @param bool $overwrite   overwrite existing `$_ENV` keys?
     */
    public function __construct(
        string $path,
        bool $overwrite = true
    ) {
        $env = static::load($path);
        $_ENV = ($overwrite)
            ? $env + $_ENV
            : $_ENV + $env;
    }

    /**
     * Parse and retrieve content from .env file.
     *
     * @param string $path      path to .env file.
     * @return array            associative array of .env keys and values.
     * @throws ValueError       .env was not found at provided path.
     * @throws ErrorException   corrupted .env, unable to parse.
     * @see https://www.php.net/manual/en/function.parse-ini-file.php
     */
    public static function load(string $path): array
    {
        $path = realpath($path);
        if ($path === false) {
            throw new ValueError("File $path not found");
        }
        $env = parse_ini_file(
            filename: $path,
            process_sections: false,
            scanner_mode: INI_SCANNER_TYPED
        );
        if ($env === false) {
            throw new ErrorException("Unable to parse $path");
        }
        return $env;
    }
}
