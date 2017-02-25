<?php

// b7_19275932_0	b7_19275932	(Your cPanel Password)	sql208.byethost7.com	Backup	Admin

$servername = "sql11.freemysqlhosting.net";
$username   = "sql11160858";
$password   = "NjE1k34Kdx";
$dbname     = "sql11160858";

echo 'Hello!' . "<br>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully" . "<br>";
    
    $tab = "MyGuests";
    try {
        
        if($conn->query('DESCRIBE ' . $tab)) {
            $sql = "DROP TABLE " . $tab . ";";
            $conn->exec($sql);
            echo "Table '" . $tab . "' dropped successfully" . "<br>";
        }
    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
        
    try {
        // sql to create table
        $sql = "CREATE TABLE " . $tab . " (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
        )";
        
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table '" . $tab . "' created successfully" . "<br>";
    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>