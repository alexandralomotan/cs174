<?php
$username = 'CS174';
$paswword = 'pw174';

    try {
        //connect to database
        $con = new PDO("mysql:host=localhost; dbname=cs 174",
                       $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE,
                           PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex) {
        echo 'ERROR: ' . $ex->getMessage();
    }
    
    $restuarant = filter_input(INPUT_POST, "restaurantName");
    print "$restuarant has been added";
    
?>

