<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
  <script src="js/datepicker.js"></script>
</head>

<body>
    <div id="body">
	
	
	
	<p>
	    <label>Location:</label>
	    <input type="checkbox" name="location" value="yes"/>San Jose, CA
	    <input type="checkbox" name="location" value="yes"/>Milpitas, CA
	    <input type="checkbox" name="location" value="yes"/>Fremont, CA
	    <input type="checkbox" name="location" value="yes"/>Sunnyvale, CA
	    <input type="checkbox" name="location" value="yes"/>Los Gatos, CA
	</p>

	<p>
	    <label>Cuisine:</label>
	    <input type="checkbox" name="location" value="yes"/>American
	    <input type="checkbox" name="location" value="yes"/>Cuban
	    <input type="checkbox" name="location" value="yes"/>French
	    <input type="checkbox" name="location" value="yes"/>Italian
	    <input type="checkbox" name="location" value="yes"/>Japanese
	    <input type="checkbox" name="location" value="yes"/>Mexican
	</p>

	<form action="">
	    <select name="restaurants" onchange="showRestaurant(this.value)">
		<option value="">Select a restaurant:</option>
		<option value="Pepper Lunch">Pepper Lunch</option>
		<option value="Five Guys">Five Guys</option>
		<option value="In N Out">In-N-Out</option>
		<option value="Panda Express">Panda Express</option>
	    </select>
	</form>
	<div id="txtHint">Pick a restaurant...</div>

	<script>
	    function showRestaurant(str) {
		var xhttp;
		if (str != "") {
		    document.getElementById("txtHint").innerHTML = str;
		    return;
		}
		if (str == "") {
		    document.getElementById("txtHint").innerHTML = "Pick a restaurant...";
		    return;
		}
	      }
	</script>
	
	<p>
            <form action="queryDB-zelp.php" method="post">
                <fieldset>
                    <legend>Select Restaurant (php)</legend>
                    <p>
                        <label>Restaurant Name:</label>
                        <input name="restaurantName" type="text" placeholder="Submit blank to show all."/>
                    </p>
                    <p>
                        <input type="submit" value="Submit" />
                    </p>
                </fieldset>
            </form>
        </p>

	<p>
            <form action="queryDB-zelp-cuisine.php" method="post">
                <fieldset>
                    <legend>Cuisine (php)</legend>
                    <p>
                        <label>Cuisine:</label>
                        <input name="restaurantName" type="text" placeholder="Submit blank to show all."/>
                    </p>
                                    <p>
                        <input type="submit" value="Submit" />
                    </p>
                </fieldset>
            </form>
        </p>

        <p>
          Date: <input id="datepicker" type="text" placeholder="Click to select a date"/>
        </p>

    </div>
</body>

</html>
