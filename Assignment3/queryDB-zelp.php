<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
    <title>Database Table</title>
</head>

<body>
	<?php
	$username = 'zelp_admin';
	$password = 'zelp';
	    try {
		//connect to database
		$con = new PDO("mysql:host=localhost; dbname=Zelp",
			       $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE,
				   PDO::ERRMODE_EXCEPTION);

			$restaurant = filter_input(INPUT_POST, "restaurantName");

			//$query = "SELECT *
			//	      FROM Restaurant
			//		  ORDER BY `id`";

      // prepared statement
      $query = "SELECT Restaurant.name as 'Restaurant',
                        Cuisine.name as 'Cuisine',
	                      City.name as 'City',
                        Price_Range.name as 'Price Range'
                 FROM Restaurant, Cuisine, City, Price_Range
                 WHERE Restaurant.cuisine_fk = Cuisine.id
                    AND Restaurant.city_fk = City.id
                    AND Restaurant.price_range_fk = Price_Range.id";

			print "<table border='1'>\n";


			//if a user enters a restaurant name, then query data from it.
			if((strlen($restaurant)) > 0){
			//$query = "SELECT *
			//	  FROM `Restaurant`
			//		  WHERE `name` = ('$restaurant')";

      $query = "SELECT Restaurant.name as 'Restaurant',
                        Cuisine.name as 'Cuisine',
	                      City.name as 'City',
                        Price_Range.name as 'Price Range'
                 FROM Restaurant, Cuisine, City, Price_Range
                 WHERE Restaurant.name = ':restaurant'
                    AND Restaurant.cuisine_fk = Cuisine.id
                    AND Restaurant.city_fk = City.id
                    AND Restaurant.price_range_fk = Price_Range.id";
		    }

      //$ps = $con->prepare($query);
      //  $ps->execute(array(':restaurant' => $restaurant));

      $result = $con->query($query);
		    $result ->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetch();

			$data = $con->query($query);
		    $data->setFetchMode(PDO::FETCH_ASSOC);

      //$data = $con->query($query);
      //  $data = $ps->fetchAll(PDO::FETCH_ASSOC);

			//prints out the header for the table
			$header = true;
			foreach($data as $row) {
				if($header){
					print "           <tr>\n";

				    foreach($row as $name => $value) {
				    print "                <th>$name</th>\n";
				}
				print "           </tr>\n";

				$header = false;
				}
				//prints out the data for the table
				print "              <tr>\n";
				foreach($row as $name => $value) {
				    print "                <td>$value</td>\n";
			}
			print "                  </tr>\n";
	    }
		}

		catch(PDOException $ex) {
		echo 'ERROR: ' . $ex->getMessage();
	    }



	?>
</body>
