<?php 

    const DBHOST = 'sql210.infinityfree.com';
    const DBUSER = 'if0_38638378';
    const DBPASS = 'AkenjgX5Jyz';
    const DBNAME = 'if0_38638378_absolute';

    $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . '';
    $conn = null;

    try {
        $conn = new PDO($dsn, DBUSER, DBPASS);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Error : " . $e->getMessage());
    }


?>