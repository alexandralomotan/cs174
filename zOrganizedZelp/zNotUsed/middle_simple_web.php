<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
</head>

<body>
    <div id="body">
        <p>
	    <form>
	        <fieldset>
	            <legend>Sample Text Form(Submit does not do anything)</legend>
	            <p>
	                <label>Sample Text Box:</label>
	                <input name="textbox" type="text" />
	            </p>
	            <p>
	                <input type="submit" value="Submit" />
	            </p>
	        </fieldset>
	    </form>
	</p>

        <p>
            <form action="queryDB.php" method="get">
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

	<form>
		<fieldset>
			<legend>Homework 1</legend>
			<p>
				<label>Grade:</label>
				<input type="radio" name="choices" value="yes"/>A+
				<input type="radio" name="choices" value="yes"/>A
				<input type="radio" name="choices" value="yes"/>A
				<input type="radio" name="choices" value="yes"/>A
			</p>
			<p>
				<label>Feedback Options:</label>
				<input type="checkbox" name="choices" value="yes"/>100%!
				<input type="checkbox" name="choices" value="yes"/>Amazing!
			</p>
		</fieldset>
	</form>
    </div>
</body>

</html>
