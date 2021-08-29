<?php

declare(strict_types=1);

namespace Env;

use RuntimeException;

use const INI_SCANNER_TYPED;

use function realpath;
use function parse_ini_file;

final class Dotenv
{
    public function __construct(string $path, bool $overwrite = false)
    {
        $path = realpath($path);

        if ($path === false) {
            throw new RuntimeException('The .env file not found.');
        }

        $env = parse_ini_file($path, false, INI_SCANNER_TYPED);

        if ($env === false) {
            throw new RuntimeException('The .env file cannot be parsed.');
        }

        $_ENV = $overwrite ? $env + $_ENV : $_ENV + $env;
    }

    public static function get(string $key): null|bool|string|int|float
    {
        return $_ENV[$key] ?? null;
    }
}