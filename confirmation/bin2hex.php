<?php

$uniqueIDog = openssl_random_pseudo_bytes (3);
$uniqueid = bin2hex($uniqueIDog);

echo($uniqueid);

?>