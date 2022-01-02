<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
->withServiceAccount('phpfirebasecrud-firebase-adminsdk-ijgnl-1d3ed53f69.json')
->withDatabaseUri('https://phpfirebasecrud-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
?>
