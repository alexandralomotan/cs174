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
        //print "$restaurant has been added";
		
		$query = "SELECT *
			      FROM restaurants";
					  
	
		print "<table border='1'>\n";
		
		$result = $con->query($query);
	    $result ->setFetchMode(PDO::FETCH_ASSOC);
		$row = $result->fetch();
		
		if((strlen($restaurant)) > 0){
		//$query = "INSERT INTO `restaurants`(`Restaurant Name`)
		//          VALUES ('$restaurant')";
		$query = "SELECT *
		          FROM `restaurants`
				  WHERE `Restaurant Name` = ('$restaurant')";
				  
				  //$data = $con->query($query);
	              //$data->setFetchMode(PDO::FETCH_ASSOC);
	    }
		
		
		//$query = "SELECT *
		//	      FROM restaurants";
		
		$data = $con->query($query);
	    $data->setFetchMode(PDO::FETCH_ASSOC);
				  
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
