<!DOCTYPE html>
<html lang="en-US">
<head>
    <!--<meta charset="UTF-8">-->
    <!--<link rel="stylesheet" href="./css/layout.css" type="text/css" />-->
    <title>Zelp: Restaurants</title>
</head>

<body>
    <div id="content">

	<!--Drop down menu (ajax)-->
	<form action="">
	    <select name="cuisine" onchange="showRestaurant(this.value)">
		<option value="">Select a cuisine:</option>
		<option value="American">American</option>
		<option value="Chinese">Chinese</option>
		<option value="Cuban">Cuban</option>
		<option value="Japanese">Japanese</option>
		<option value="Vietnamese">Vietnamese</option>
	    </select>
	</form>
	<div id="txtHint">Pick a cuisine...</div>
	<script>
	    function showRestaurant(str) {
		var xhttp;
		if (str != "") {
		    document.getElementById("txtHint").innerHTML = str;
		    return;
		}
		if (str == "") {
		    document.getElementById("txtHint").innerHTML = "Pick a cuisine...";
		    return;
		}
	      }
	</script>

	<br>

	<?php
  	$username = 'zelp_admin';
	$password = 'zelp';

		class Restaurant
		{
			private $Restaurant;
			private $Cuisine;
			private $City;
			private $Price_Range;

			public function getRestName()         { return $this->Restaurant; }
			public function getCuisName()         { return $this->Cuisine; }
			public function getCityName()         { return $this->City; }
			public function getPrngName()         { return $this->Price_Range; }
		}

		function createTableRow(Restaurant $rest)
		{
			print "<tr>\n";
			print "<td>" . $rest->getRestName() . "</td>\n";
			print "<td>" . $rest->getCuisName() . "</td>\n";
			print "<td>" . $rest->getCityName() . "</td>\n";
			print "<td>" . $rest->getPrngName() . "</td>\n";
			print "</tr>\n";
		}

		$restaurant = filter_input(INPUT_POST, "restaurantName");

		try {
		  //connect to database
		  $con = new PDO("mysql:host=localhost; dbname=Zelp",
	         		       $username,
                     $password);
		  $con->setAttribute(PDO::ATTR_ERRMODE,
				                 PDO::ERRMODE_EXCEPTION);

	    // prepared statement
             $query = "SELECT Restaurant.name as 'Restaurant',
                         Cuisine.name as 'Cuisine',
	                     City.name as 'City',
                         Price_Range.name as 'Price_Range'
                      FROM Restaurant, Cuisine, City, Price_Range
                      WHERE Restaurant.cuisine_fk = Cuisine.id
                      AND Restaurant.city_fk = City.id
                      AND Restaurant.price_range_fk = Price_Range.id";

			 print "<table border='1'>\n";

			 $result = $con->query($query);
			 $row = $result->fetch(PDO::FETCH_ASSOC);

			 //prints the database field header names
			 print "<tr>\n";
			 foreach ($row as $field => $value) {
				     print "<th>$field</th>\n";
			 }
			 print "</tr>\n";

			 //if a user enters a restaurant name, then query data from it.
			 if((strlen($restaurant)) > 0){
                $query = "SELECT Restaurant.name as 'Restaurant',
                          Cuisine.name as 'Cuisine',
	                      City.name as 'City',
                          Price_Range.name as 'Price_Range'
                         FROM Restaurant, Cuisine, City, Price_Range
                         WHERE Restaurant.cuisine_fk = Cuisine.id
                         AND Restaurant.city_fk = City.id
                         AND Restaurant.price_range_fk = Price_Range.id
                         AND Restaurant.name = :restaurant";
					     $ps = $con->prepare($query);
					     $ps->bindParam(':restaurant', $restaurant);
		     }
			 else {
				  $ps = $con->prepare($query);
			 }

			 $ps->execute();
			 $ps->setFetchMode(PDO::FETCH_CLASS, "Restaurant");

			//prints each database row using ORM
			 while($r = $ps->fetch()) {
				  print "<tr>\n";
				  createTableRow($r);
				  print "</tr>\n";
			 }
        print "</table>\n";
		}
		catch(PDOException $ex) {
		  echo 'ERROR: ' . $ex->getMessage();
	  }
	?>

    </div>
</body>

</html>
