<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
    <script type="text/javascript" src="js/hover.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
	$("a").hover(function(){
	    $(this).css("background-color", "red");
	    }, function(){
	    $(this).css("background-color", "#eeeeee");
	});
    });
    </script>
</head>

<body>
    <div id="navbar">
	<a href="./index.php">Home</a><br>
	<a href="./restaurants.php">Search Cuisines</a><br>
	<a href="./descriptions.php">Restaurants</a><br>
	<a href="./pictures.php">Pictures</a><br>
	<a href="./about.php">About</a><br>
    </div>
</body>

</html>
