<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/layout.css" type="text/css" />

    <title>Zelp: Restaurants</title>
</head>

<body>
    <div id="body">
	Pick a cuisine: <br>
	<!--Drop down menu (ajax)-->
	<!--set action to the path of where restaurants.php is located on your machine-->
	<form action = "http://localhost/CS174/RevampedZelp/restaurants.php"> 
	    <select name="cuisine" onchange="showRestaurant(this.value)">
		<option value="">Select a cuisine:</option>
		<option value="American">American</option>
		<option value="Chinese">Chinese</option>
		<option value="Cuban">Cuban</option>
		<option value="Japanese">Japanese</option>
		<option value="Vietnamese">Vietnamese</option>
	    </select>
	</form>
	
	<br>
	
	<div id="txtHint"></div>
	<script>
	    function showRestaurant(str) {
		var xhttp;

		if (str != ""){
			if(window.XMLHttpRequest){
			   //xmlhttp request used for IE7+, Firefox, Chrome, Opera, Safari
			   xhttp = new XMLHttpRequest();
			   //document.getElementById("txtHint").innerHTML = "";
			}
			else {
			   //xmlhttp request used for IE5, IE6
			   xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
			   if(xhttp.readyState == 4 && xhttp.status == 200){			  
				  //document.getElementById("txtHint").innerHTML = xhttp.responseText;
			      document.getElementById("txtHint").innerHTML = xhttp.responseText;
			   }
			};
			xhttp.open("GET","./middle/_getcuisine.php?q="+str,true);
			//document.getElementById("txtHint").innerHTML = "";
			xhttp.send();
		}
		else {
		    document.getElementById("txtHint").innerHTML = "Pick a cuisine...";
		    return;
		} 
		
	  }
	</script>
	
    </div>
	
</body>

</html>