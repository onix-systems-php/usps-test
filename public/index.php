<?php
require __DIR__ . '/../vendor/autoload.php';

//test db connection
$connection = pg_connect ("host=db dbname=dbname user=dbuser password=dbpass");
if($connection) {
    echo 'PG Connected';
} else {
    echo 'There has been an error with PG Connection';
}