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
	    
	    errors = "";
	    
	    if (firstname == "") {
		errors += "Missing first name.\n";
	    }
		
	    else if (lastname == "") {
		errors += "Missing last name.\n";
	    }
		
	    else if (password == "") {
		errors += "Missing password.\n";
	    }
		
	    emailRE = /^.+@.+\..{2,4}$/;
	    if (!email.match(emailRE)){
		errors += "Invalid email address. " +
			    "Should be xxxxx@xxxxx.xxx\n";
	    } 
	    else if (email == "") {
		errors += "Missing email.\n";
	    }
		
	    if (errors != "") {
              alert(errors);
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
		       pattern = "^.+@.+\..{2,4}$"
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