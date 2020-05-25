<?php

require '../dbconn.php';

//Get variables

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$addy = $_POST['address'];

//Make sure theres a ticket available

$avil_ticket_smt = "SELECT MAX(ticket_no) FROM eventtable";

if ($result = mysqli_query($conn, $avil_ticket_smt)){
    while ($row = mysqli_fetch_row($result)) {

        $ticketNo = $row[0];

    }
}

 if ($ticketNo < 97){
    echo('less than 100');

    //if yes
        //generate uniqe ID

        $uniqueIDog = openssl_random_pseudo_bytes (3);
        $uniqueid = bin2hex($uniqueIDog);

        //make phone number sql happy

        //$phono = substr($phno, 1);

        //add to db

        $query = "INSERT INTO eventtable (id, firstname, lastname, email, phno, address)
                  VALUES('$uniqueid', '$fname', '$lname', '$email', '$phno', '$addy');";

        $insert = mysqli_query($conn, $query);

        //echo($query);


        //generate QR Code and email


        $cmd = 'sudo /usr/bin/python /path/to/generation/script/generate.py '.escapeshellarg($uniqueid).' '.escapeshellarg($fname).' '.escapeshellarg($lname).' '.escapeshellarg($email).' 2>&1';

        

        $out = shell_exec($cmd);

        //echo($uniqueid);
        
        var_dump($out);
        

}else{

    echo('More than 100');
    
    //echo('Our apologies as tickets have sold out');
} 



//if no, say sorry

?>