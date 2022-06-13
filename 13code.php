<?php

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$fname = test_input($_POST['firstname']);
		$lname = test_input($_POST['lastname']);
		$username = test_input($_POST['username']);
		$pass = test_input($_POST['pass']);
		$email = test_input($_POST['email']);
		$mobno = test_input($_POST['mobno']);
		$address = test_input($_POST['address']);

		$store=array(
			'firstname' => $fname, 
			'lastname' => $lname,
			'username' => $username, 
			'pass' => $pass,
			'email' => $email,
			'mobno' => $mobno,
			'address' => $address

		);


		if (empty($fname) or empty($lname) or empty($username) or empty($pass) or empty($email) or empty($mobno) or empty($address)) {
			echo "Please fill up the form properly";
		}
		else {

			if(filesize("data.json") == 0){

				$record = array($store);
				$data = $record;


				echo "Registration Successful";
			}

			else{
				$olddata = json_decode(file_get_contents("data.json"));

				array_push($olddata, $store); 

				$data = $olddata;
			}
		}













		if(filesize("data.json") == 0){

			$record = array($store);
			$data = $record; 
		}

		else{

			$olddata = json_decode(file_get_contents("data.json"));

			array_push($olddata, $store); 

			$data = $olddata;
		}

		if(!file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT),LOCK_EX)){
			$error = "Error storing message, please try again.";
		}
		else{
			$success = "Message store successfully.";
		}



	}

	echo '<a href="http://127.0.0.1/LAB/login.html">Login From </a>'

?>



