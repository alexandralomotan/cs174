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

//$ps = $con->prepare($query);
// debug - print $restaurant
//print '$restaurant = ';
//print $restaurant;
//print '<br>';
//$temp = array(':restaurant'=>$restaurant);
// debug - print the array we feed to execute
//var_dump($temp);
//print '<br>';
// $ps->execute(array(':restaurant'=>$restaurant));

//$data = $ps->fetchAll(PDO::FETCH_ASSOC);

                // prints out the header for the table
                /* $header = true;
                foreach($data as $row) {
                        if($header){
                                print "           <tr>\n";
                          foreach($row as $name => $value) {
                            print "                <th>$name</th>\n";
                          }
                          print "           </tr>\n";
                          $header = false;
                        }

// prints out the data for the table
                        print "              <tr>\n";
                        foreach($row as $name => $value) {
                          print "                <td>$value</td>\n";
                  }
                  print "                  </tr>\n";
    } */
print "</table>\n";
        }
        catch(PDOException $ex) {
          echo 'ERROR: ' . $ex->getMessage();
  }
?>
