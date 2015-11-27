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
       
		
		class Cuisine
		{
			private $id;
			private $name;
			private $description;
			
			public function getID()       { return $this->id; }
			public function getName()     { return $this->name; }
			public function getDescr()    { return $this->description; }
		}
		
		function createTableRow(Cuisine $cuis)
		{
			print "<tr>\n";
			print "<td>" . $cuis->getID()    . "</td>\n";
			print "<td>" . $cuis->getName()  . "</td>\n";
			print "<td>" . $cuis->getDescr() . "</td>\n";
			print "</tr>\n";
		}
		
		$cuisine = filter_input(INPUT_POST, "cuisineName");
        
		try {
		  //connect to database
		  $con = new PDO("mysql:host=localhost; dbname=Zelp",
	         		       $username,
                     $password);
		  $con->setAttribute(PDO::ATTR_ERRMODE,
				                 PDO::ERRMODE_EXCEPTION);

			

      // prepared statement
             $query = "SELECT *
				      FROM Cuisine
					  ORDER BY `id`";

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
			 if((strlen($cuisine)) > 0){
			   $query = "SELECT *
				        FROM `Cuisine`
					    WHERE `name` = :cuisine";
					    $ps = $con->prepare($query);
					    $ps->bindParam(':cuisine', $cuisine);
			 }
			 else {
				  $ps = $con->prepare($query);
			 }
			
			 $ps->execute();
			 $ps->setFetchMode(PDO::FETCH_CLASS, "Cuisine");
			
			//prints each database row using ORM
			 while($c = $ps->fetch()) {
				  print "<tr>\n";
				  createTableRow($c);
				  print "</tr>\n";
			 }

      //$ps = $con->prepare($query);
        // debug - print $cuisine
        //print '$cuisine = ';
        //print $cuisine
        //print '<br>';
      //$temp = array(':cuisine'=>$cuisine);
        // debug - print the array we feed to execute
        //var_dump($temp);
        //print '<br>';
        // $ps->execute(array(':cuisine'=>$cuisine));

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
</body>
</html>
