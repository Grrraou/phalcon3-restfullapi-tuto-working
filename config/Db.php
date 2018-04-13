<?php

use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

// Set up the database service
$di->set(
        'db',
        function () {
                return new PdoMysql(
                        [
                                'host'          => 'localhost',
                                'username'      => 'root',
                                'password'      => 'password',
                                'dbname'        => 'Toys',
                        ]
                );
        }
);

