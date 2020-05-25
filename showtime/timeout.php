<?php

header('Content-Type: application/json');

require '../dbconn.php';

$id = $_POST['id'];
$name = $_POST['name'];

$in = date("Y-m-d H:i:s");

$insertquery = "UPDATE eventtable SET time_out = '$in' WHERE id = '$id';";

$q = mysqli_query($conn, $insertquery);

$verifyquery = "SELECT time_out FROM eventtable WHERE id = '$id';";

if ($v = mysqli_query($conn, $verifyquery)){
    while ($row = mysqli_fetch_row($v)){

        $verifyin = $row[0];

    }
}

if ($verifyin == NULL){
    echo('{"timeout":{"verify":"false"}}');
}else {
    echo('{"timeout":{"verify":"true"}}');
}

?>