<?php

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		$f = fopen("data.json", 'r');

		$s = fread($f, filesize("data.json"));

		$data = json_decode($s);

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test_input($_POST['username']);
		$pass = test_input($_POST['pass']);

		$flag = false;

		for($i=0; $i<sizeof($data); $i++)
		{

			if($data[$i]->username === $username and $data[$i]->pass === $pass){
				$flag = true;
				break; 
			}
			
				




		}

		if(!$flag){
			echo "Error ! Password/Username incorrect.";
		}
	}

?>



