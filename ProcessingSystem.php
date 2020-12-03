<?php
    $servername = "blitz.cs.niu.edu";
    $username = "student";
    $password = "student";
    $dbname = "csci467";

    // Create connection
    $connect = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    else
    {
        echo "Connection Success<br>";
    }
    //populate customer database
    $SQL = "SELECT name FROM customers";
    $result = $connect->query($SQL);

    $fp = fsockopen( "udp://blitz.cs.niu.edu", 4446, $errno, $errstr );
    if (!$fp) die("$errstr ($errno)<br>");
    $message = "8654322:IBM Corporation:2,400,000.00";
    echo "Sending: $message<br>";
    fwrite( $fp, $message ) or die("write failed<br>");
    $response = fread($fp, 1024);
    echo "Received: $response<br>";
    fclose($fp);
?>
