<?php

function connectDatabase(): mysqli
{
    $environmentFile = dirname(__DIR__, 2) . '/.env';
    if (is_readable($environmentFile)) {
        $settings = parse_ini_file($environmentFile, false, INI_SCANNER_RAW);
        foreach ($settings ?: [] as $key => $value) {
            if (getenv($key) === false) {
                putenv($key . '=' . $value);
            }
        }
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $port = (int) (getenv('DB_PORT') ?: 3306);
    $database = getenv('DB_NAME') ?: 'clients';
    $username = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD');

    $connection = new mysqli(
        $host,
        $username,
        $password === false ? '' : $password,
        $database,
        $port
    );
    $connection->set_charset('utf8mb4');

    return $connection;
}
