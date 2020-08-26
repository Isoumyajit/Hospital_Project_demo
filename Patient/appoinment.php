<html>
<head>
	
	<title>appoinment</title>


	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet"  href="app.css">
	<title>NIT HealthCare</title>
</head>
<body background="8.jpg">
    <div id="div1"><h2 align="center">NIT HealthCare</h2></div>
     <div id="div2"><a href="hospital1.html"><h3>HOME</h3></a></div>
		<div id="div3"><a href="res2.html"><h3>ABOUT</h3></a></div>
			<div id="div4"><a href="res3.html"><h3>CONTACT US</h3></a></div>






<h1 class="hue" align="center">Appoinmets</h1>
<div id="div21" >
<table id="t1" border="2" cellspacing="2" cellpadding="12">
	<thead>
      <tr>
		<th>Number</th>
		<th>Doctor</th>
		<th>Date</th>
		<th>Time</th>
     </tr>
  </thead>	
	<?php
	$conn = mysqli_connect("localhost", "root", "", "uni");
	if($conn-> connect_error)
	{
		die("connection failed!". $conn-> connect_error);
	}     
	$sql = "SELECT Number,doctor,Date,Time from user ";
 
	$result = $conn-> query($sql);
    
	if($result-> num_rows >0 )
	{
		while($row=$result-> fetch_assoc())
		{
			echo "<tr><td>". $row["Number"] . "</td><td>". $row["doctor"] . "</td><td>". $row["Date"] . "</td><td>" .
			$row["Time"] ."</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "0 result";
	}

	$conn-> close();
	?>


</table>
</div>
</body>
</html>