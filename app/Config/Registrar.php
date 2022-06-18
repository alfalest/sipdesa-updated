<?php

namespace Config;

class Registrar
{

    public static function get_uri_base()
    {
        if ((isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) || $_SERVER['SERVER_PORT'] == 443) {
            $protocol = 'https://';
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        return $protocol . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/.\\');
    }

    public static function Pager(): array
    {
        return [
            'templates' => [
                'sipdesa_pager'   => 'App\Views\pager\pager'
            ],
        ];
    }

    public static function App(): array
    {
        return [
            'appTimezone' => 'Asia/Jakarta',
            'baseURL' => self::get_uri_base(),
        ];
    }

    public static function Database(): array
    {
        return [
            'default' =>  [
                'DSN'      => '',
                'hostname' => 'localhost',
                'username' => 'root',
                'password' => '',
                'database' => 'sipdesa_db',
                'DBDriver' => 'MySQLi',
                'DBPrefix' => '',
                'pConnect' => false,
                'DBDebug'  => (ENVIRONMENT !== 'production'),
                'charset'  => 'utf8',
                'DBCollat' => 'utf8_general_ci',
                'swapPre'  => '',
                'encrypt'  => false,
                'compress' => false,
                'strictOn' => false,
                'failover' => [],
                'port'     => 3306,
            ]
        ];
    }
}
