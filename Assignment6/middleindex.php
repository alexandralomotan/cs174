<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<!--<link rel="stylesheet" href="./css/styles.css" type="text/css" />-->
	<!--<link rel="stylesheet" href="./css/layout.css" type="text/css" />-->
  <link rel="stylesheet" href="./jquery-ui-1.11.4.custom/jquery-ui.css" type="text/css" />
  <script type="text/javascript" href="./jquery-ui-1.11.4.custom/jquery-ui.js"></script>
  <script type="text/javascript" href="./js/datepicker.js"></script>
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
          Date: <input type="text" id="datepicker" />
        </p>

    </div>
</body>

</html>
