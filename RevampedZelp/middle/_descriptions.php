<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/layout.css" type="text/css" />

    <title>Zelp: Restaurants</title>
</head>

<body>
    <div id="body">

        <table border="1">
            <col width="230"> <!--Column size left side of table-->
            <col width="80"> <!--Column size middle side of table-->
            <col width="80"> <!--Column size right side of table-->

            <!--<tr>
                <th>Restaurants</th>
                <th>Headers</th>
                <th>Inputs</th>
            </tr>-->
            <tr>
                <td>(Restaurant Name)</td>
                <td>Price Range:</td>
                <td>(price range)</td>
            </tr>
            <tr>
                <td rowspan=2>(Description)</td>
                <td>City:</td>
                <td>(city)</td>
            </tr>
            <tr>
                <!--blank-->
                <td>Cuisine:</td>
                <td>(cuisine)</td>
            </tr>
        </table>
        
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
                    private $Description;
                    
                    public function getRestName()         { return $this->Restaurant; }
                    public function getCuisName()         { return $this->Cuisine; }
                    public function getCityName()         { return $this->City; }
                    public function getPrngName()         { return $this->Price_Range; }
                    public function getDescName()         { return $this->Description; }
            }
            
            function createTableRow(Restaurant $rest)
            {
                    print "<tr>\n";
                    print "<td>" . $rest->getRestName() . "</td>\n";
                    print "<td>" . $rest->getCuisName() . "</td>\n";
                    print "<td>" . $rest->getCityName() . "</td>\n";
                    print "<td>" . $rest->getPrngName() . "</td>\n";
                    print "<td>" . $rest->getDescName() . "</td>\n";
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
                        Price_Range.name as 'Price_Range',
                        Restaurant.description as 'Description'
                  FROM Restaurant, Cuisine, City, Price_Range
                  WHERE Restaurant.cuisine_fk = Cuisine.id
                    AND Restaurant.city_fk = City.id
                    AND Restaurant.price_range_fk = Price_Range.id";
                                    
                     print "<table border='1'>\n";

                     $result = $con->query($query);
                     $row = $result->fetch(PDO::FETCH_ASSOC);
                    
                     //prints the database field header names
                     //print "<tr>\n";
                     //foreach ($row as $field => $value) {
                     //            print "<th>$field</th>\n";
                     //}
                     print "</tr>\n";
                    
                    
                    $ps = $con->prepare($query); //get all the data from database
                    
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