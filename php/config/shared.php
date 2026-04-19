<?php

if (!function_exists('nom035_env_or_default')) {
    /**
     * Return environment variable value when defined, otherwise fallback value.
     */
    function nom035_env_or_default(string $key, string $fallback): string
    {
        $value = getenv($key);
        return ($value === false || $value === '') ? $fallback : $value;
    }
}

if (!function_exists('nom035_get_config')) {
    /**
     * Centralized app and database configuration.
     */
    function nom035_get_config(string $profile = 'main'): array
    {
        $profiles = [
            'main' => [
                'db_server' => 'localhost',
                'db_username' => 'nom26_1',
                'db_password' => '+DO+{qi}HxM7',
                'db_database' => 'nom2026',
            ],
            'human' => [
                'db_server' => 'localhost',
                'db_username' => 'cnom035',
                'db_password' => 'CCnNMN*.*035',
                'db_database' => 'cnom035',
            ],
        ];

        $selected = $profiles[$profile] ?? $profiles['main'];

        return [
            'timezone' => nom035_env_or_default('NOM035_TIMEZONE', 'America/Mexico_City'),
            'charset' => nom035_env_or_default('NOM035_DB_CHARSET', 'utf8'),
            'url_base' => nom035_env_or_default('NOM035_URL_BASE', 'http://www.humanpro.com.mx/'),
            'url_folder' => nom035_env_or_default('NOM035_URL_FOLDER', 'nom035/'),
            'db' => [
                'server' => nom035_env_or_default('NOM035_DB_SERVER', $selected['db_server']),
                'username' => nom035_env_or_default('NOM035_DB_USERNAME', $selected['db_username']),
                'password' => nom035_env_or_default('NOM035_DB_PASSWORD', $selected['db_password']),
                'database' => nom035_env_or_default('NOM035_DB_DATABASE', $selected['db_database']),
            ],
        ];
    }
}

if (!function_exists('nom035_get_smtp_config')) {
    /**
     * SMTP/Email configuration with environment variable support.
     */
    function nom035_get_smtp_config(string $profile = 'default'): array
    {
        $profiles = [
            'default' => [
                'host' => 'smtpout.secureserver.net',
                'port' => 465,
                'secure' => 'ssl',
                'username' => 'amurphy@humanpro.com.mx',
                'password' => 'amurphy',
                'from_email' => 'amurphy@humanpro.com.mx',
                'from_name' => 'Buzón de quejas y sugerencias',
            ],
            'buzones' => [
                'host' => 'smtpout.secureserver.net',
                'port' => 465,
                'secure' => 'ssl',
                'username' => 'nom35@humanpro.page',
                'password' => 'humanprosend1249',
                'from_email' => 'nom35@humanpro.page',
                'from_name' => 'NOM-035 Buzones',
            ],
            'humannom' => [
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'secure' => 'tls',
                'username' => 'humannom035@gmail.com',
                'password' => '*.*SAGM851105at5',
                'from_email' => 'humannom035@gmail.com',
                'from_name' => 'NOM-035 Sistema',
            ],
        ];

        $selected = $profiles[$profile] ?? $profiles['default'];

        return [
            'host' => nom035_env_or_default('NOM035_SMTP_HOST_' . strtoupper($profile), $selected['host']),
            'port' => (int) nom035_env_or_default('NOM035_SMTP_PORT_' . strtoupper($profile), (string) $selected['port']),
            'secure' => nom035_env_or_default('NOM035_SMTP_SECURE_' . strtoupper($profile), $selected['secure']),
            'username' => nom035_env_or_default('NOM035_SMTP_USER_' . strtoupper($profile), $selected['username']),
            'password' => nom035_env_or_default('NOM035_SMTP_PASS_' . strtoupper($profile), $selected['password']),
            'from_email' => nom035_env_or_default('NOM035_SMTP_FROM_' . strtoupper($profile), $selected['from_email']),
            'from_name' => nom035_env_or_default('NOM035_SMTP_FROM_NAME_' . strtoupper($profile), $selected['from_name']),
        ];
    }
}
