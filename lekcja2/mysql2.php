<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn ->connect_error) die($conn->connect_error);

     $query = "SELECT * FROM kryminaly";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    for($j =0; $j < $rows; ++$j)
    {
        $result->data_seek($j);
        echo 'autor: ' .$result->fetch_assoc()['autor'] .'<br>';
        $result->data_seek($j);
        echo 'Tytuł: ' .$result->fetch_assoc()['tytuly'] .'<br>';
        $result->data_seek($j);
        echo 'Rok: ' .$result->fetch_assoc()['rok'] .'<br>';
    }

    $result -> close();
    $conn -> close();
?>