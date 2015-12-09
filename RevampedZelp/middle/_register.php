<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="./css/styles.css" type="text/css" />
	<link rel="stylesheet" href="./css/layout.css" type="text/css" />
	<link rel="stylesheet" href="./css/validate.css" type="text/css" />
    <script type="text/javascript">
	function addToUsersTable()
	{
	    var firstname = document.getElementById("fname").value;
	    var lastname = document.getElementById("lname").value;
	    var password = document.getElementById("pass").value;
		var email = document.getElementById("email").value;
	    
		if (firstname == "") {
		alert("Missing first name");
	    }
		
		else if (lastname == "") {
		alert("Missing last name");
	    }
		
		else if (password == "") {
		alert("Missing password");
	    }
		
		else if (email == "") {
		alert("email");
	    }
		
	    else {
		alert("Account Added");
	    }
	}
    </script>
</head>

<body>
    <div id="body">
        <form action = "" method="post">
            <fieldset>
                <legend>Register</legend>
                <p>
                    <label>First Name:</label>
                    <input type = "text"
			   size="35"
                       placeholder = "Enter First Name"
                       id = "fname"
                       required />
                </p>
                <p>
                    <label>Last Name:</label>
                    <input type = "text"
			   size="35"
                       placeholder = "Enter Last Name"
                       id = "lname"
                       required />
                </p>
                <p>
                    <label>Password:</label>
                    <input type = "password"
			   size="35"
                       placeholder = "Enter password"
                       id = "pass"
                       required />
                </p>
                <p>
                    <label>Email:</label>
                    <input type = "text"
			   size="35"
                       placeholder = "Enter Email"
                       id = "email"
                       required />
                </p>
                <p>
                    <button type = "submit" onclick="addToUsersTable()">Submit</button>
                </p>
            </fieldset>
        </form>
    </div>
</body>

</html>