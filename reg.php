<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

<?php 
	$firstname = $lastname = $gender = $email = $mobno = $address = $country = "";
	$fname_error = $lname_error= $gender_error= $email_error= $mobno_error = $address_error= $country_error="";

	if($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}
	
		$firstname = test($_POST['fname']);
		$lastname = test($_POST['lname']);
		$gender = isset($_POST['gender']) ? test($_POST['gender']):NULL;
		$email = test($_POST['email']);
		$mobno = test($_POST['mobno']);
		$address = test($_POST['address']);

		$message="";

		if(empty($firstname)){
			$fname_error = "First name empty ";
		}
		else{
			if(!preg_match("/^[a-zA-Z-']*$/", $firstname)){
				$fname_error = "Only Letters and Space";
			}
		}

		if(empty($lastname)){
			$lname_error = "Last name empty ";
		}
		else{
			if(!preg_match("/^[a-zA-Z-']*$/", $firstname)){
				$lname_error = "Only Letters and Space";
			}
		}

		if(empty($gender)){
			$gender_error="Gender is empty";
		}
		if(empty($email)){
			$email_error = "Email is empty";
		}
		else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$email_error="Please correct your email.";
			}
		}

		if(empty($mobno)){
			$mobno_error = "Mobile no is empty ";
		}
		else{
			if(!preg_match(0-9, $mobno)){
				$mobno_error = "Only Letters and Space";
			}
		}

		if(empty($address)){
			$address_error = "Address empty ";
		}

		if(empty($country)){
			$country_error = "Country empty";
		}
	
	}


?>
















	<form action="<?php echo htmlspecialchars($_Server['PHP_SELF']); ?>" method="post" novalidate>

		<fieldset>
			<legend>General</legend>
			<label for="fname">First Name </label>
			<input id="fname" type="text" name="fname" placeholder="First name" required value = "<?php echo $firstname; ?>">
			
			<span style="color: red"><?php echo $fname_error; ?></span>


			<br>
			<br>
			<label for="lname">Last Name </label>
			<input id="lname" type="text" name="lname" placeholder="Last Name" required value = "<?php echo $lastname;?>">

			<span style="color: red"><?php echo $lname_error; ?></span>

			<br>
			<br>


			<label>Gender </label>
			<input id = "male" type="radio" name="gender" value="<?php echo $gender; ?>" required>
			<label for="male">Male</label>

			<span style="color: red"><?php echo $gender_error; ?></span>

			<input id ="female" type="radio" name="gender" value="<?php echo $gender; ?>" required>
			<label for="female">Female</label>
			<span style="color: red"><?php echo $gender_error; ?></span>
			<br>
		</fieldset>


		<fieldset>
			<legend>Contact</legend>
			<label for="email"> Email </label>
			<input id="email" type="text" name="email" value="<?php echo $email; ?>" required >
			<span style="color: red"><?php echo $email_error; ?></span>
			<br>
			<br>
			<label for="mobno">Mobile No </label>
			<input id="mobno" type="number" name="mobno" required value = "<?php echo $mobno; ?>">
			<span style="color: red"><?php echo $mobno_error; ?></span>
		</fieldset>
		

		<fieldset>
			<legend>Address</legend>
			<label for="address">Street/House/Road </label>
			<input id="address" type="text" name="address" required value="<?php echo $address ?>">
			<span style="color: red"><?php echo $address_error; ?></span>
			<br>
			<br>
			<label>Country </label>
			<select name="country" required  value="<?php echo $country ?>">
			<span style="color: red"><?php echo $country_error; ?></span>
			<option>Bangladesh</option>
			<option>India</option>
			<option>Nepal</option>
			<option>Bhutan</option>
			<option>Pakistan</option>
			<option>Japan</option>
			</select>
		</fieldset>

	<br>
	<input type="submit" name="Submit" value="Register">

</form>

</body>
</html>