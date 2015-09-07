<?php
$username = 'CS 174';
$password = 'pwcs174';
    try {
        //connect to database
        $con = new PDO("mysql:host=localhost; dbname=cs 174",
                       $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE,
                           PDO::ERRMODE_EXCEPTION);
		
		$restaurant = filter_input(INPUT_POST, "restaurantName");
		
		$query = "SELECT *
			      FROM restaurants
				  ORDER BY `Restaurant Name`";
				  
					  
		print "<table border='1'>\n";
		
		
		//if a user enters a restaurant name, then query data from it.
		if((strlen($restaurant)) > 0){
		$query = "SELECT *
		          FROM `restaurants`
				  WHERE `Restaurant Name` = ('$restaurant')";
	    }
		
		
		$result = $con->query($query);
	    $result ->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		
		$data = $con->query($query);
	    $data->setFetchMode(PDO::FETCH_ASSOC);
				  
				  
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
