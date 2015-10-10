<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once '../vendor/autoload.php';

try {
	$card = new Cards\Card(13, 1);
	print_r($card);
} catch(Cards\Exceptions\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch(Exception $e) {
	echo $e->getMessage();
}
