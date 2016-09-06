<?php
require_once 'config.php';
return array(
    "paths" => array(
        "migrations" => "migrations"
    ),
    "environments" => array(
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "dev" => array(
            "adapter" => $config['db']['adapter'],
            "host" => $config['db']['host'],
            "name" => $config['db']['dbname'],
            "user" => $config['db']['username'],
            "pass" => $config['db']['password'],
            "port" => $config['db']['port']
        )
    )
);