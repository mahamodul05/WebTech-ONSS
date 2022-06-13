<?php
	
	$f = fopen("data.json", 'r');

	$s = fread($f, filesize("data.json"));

	$data = json_decode($s);
	var_dump($s);

	echo "<hr><hr>";
	var_dump($data);

	echo "<hr><hr>";

	echo $data[0]->firstname . ' ' . $data[0]->lastname . ' ' . $data[0]->username . ' ' .  $data[0]->pass;

	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Firstname</th>";
	echo "<th>LastName</th>";
	echo "<th>UserName</th>";
	echo "<th>Password</th>";
	echo "<th>Email</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Address</th>";
	echo "</tr>";
	
	for($i=0; $i<sizeof($data); $i++)
	{

		echo "<tr>";
		echo "<td>" . $data[$i]->firstname . "</td>";
		echo "<td>" . $data[$i]->lastname . "</td>";
		echo "<td>" . $data[$i]->username . "</td>";
		echo "<td>" . $data[$i]->pass . "</td>";
		echo "<td>" . $data[$i]->email . "</td>";
		echo "<td>" . $data[$i]->mobno . "</td>";
		echo "<td>" . $data[$i]->address . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	

	fclose($f);
?>