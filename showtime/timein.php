<?php

header('Content-Type: application/json');

require '../dbconn.php';

$id = $_POST['id'];
$name = $_POST['name'];

$in = date("Y-m-d H:i:s");

$insertquery = "UPDATE eventtable SET time_in = '$in' WHERE id = '$id';";

$q = mysqli_query($conn, $insertquery);

$verifyquery = "SELECT time_in FROM eventable WHERE id = '$id';";

if ($v = mysqli_query($conn, $verifyquery)){
    while ($row = mysqli_fetch_row($v)){

        $verifyin = $row[0];

    }
}

if ($verifyin == NULL){
    echo('{"timein":{"verify":"false"}}');
}else {
    echo('{"timein":{"verify":"true","name":"'.$name.'"}}');
}

?>