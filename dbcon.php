<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
//use Firebase\Auth\Token\Exception\InvalidToken;
$factory = (new Factory)
->withServiceAccount('phpfirebasecrud-firebase-adminsdk-ijgnl-1d3ed53f69.json')
->withDatabaseUri('https://phpfirebasecrud-default-rtdb.firebaseio.com/');
$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>
