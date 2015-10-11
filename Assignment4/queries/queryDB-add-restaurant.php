<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
  <title>Added</title>
</head>

<body>
    <?php
  	$username = 'zelp_admin';
	  $password = 'zelp';

    try {
	//connect to database
	$con = new PDO("mysql:host=localhost; dbname=Zelp", $username, $password);
	$con->setAttribute(PDO::ATTR_ERRMODE,
			    PDO::ERRMODE_EXCEPTION);
        
        $query = "INSERT Restaurant" .
        

	INSERT INTO Restaurant (city_fk, cuisine_fk, name, price_range_fk)
        VALUES ();
    ?>
</body>
