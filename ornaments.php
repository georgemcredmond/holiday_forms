<!-- ornament guessing form for holiday contests -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Guess the tree decorations!</title>
	<style>
		@font-face {
   			font-family: "Readex";
   			src: url("ReadexPro-Medium.ttf") format("truetype");
		}

		body {
			background-image: url('tree.jpg');
			background-size: cover;
			box-shadow:inset 0 0 0 2000px rgba(62, 105, 67, 0.5);
		}


		h1 {
			text-align: center;
			font-size: 3.5em;
			font-family: "Readex";
			color: white;
			text-shadow: 2px 2px 2px red;
		}

		p {
			font-size: 1.5em;
			color: yellow;
			text-align: center;
		}

		a {
			text-decoration: none;
			color: white;
		}

		ul {
			font-size: 1.4em;
			color: ivory;
		}

		label {
			color: white;
			text-shadow: 1px 1px 1px green;
			font-size: 1.3em;
		}

		input {
			margin-bottom:  15px;
			margin-left: 17px;
		}

		p#button {
			background-color: red;
			color: white;
			width: 240px;
			border-radius: 20px;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}

		p#button:hover {
			background-color: green;
		}


	</style>
</head>
<body>
	<?php 
		if(isset($_POST["submit"])){
			$FirstName = stripslashes($_POST["fname"]);
			$LastName = stripslashes($_POST["lname"]);
			$EmpID = stripslashes($_POST["empid"]);
			$Department = stripslashes($_POST["dept"]);
			$GuessOrn = stripslashes($_POST["guess_orn"]);
			// Replace any '~' characters with '-' characters
			$FirstName = str_replace("~", "-", $FirstName);
			$LastName = str_replace("~", "-", $LastName);
			$EmpID = str_replace("~", "-", $EmpID);
			$Department = str_replace("~", "-", $Department);
			$GuessOrn = str_replace("~", "-", $GuessOrn);

			$ExistingEmpID = array();
			if(file_exists("ContestData/decor.txt") && filesize("ContestData/decor.txt") > 0){
				$MessageArray = file("ContestData/decor.txt");
				$count = count($MessageArray);
				for($i = 0; $i < $count; ++$i){
					$CurrMsg = explode("~", $MessageArray[$i]);
					$ExistingEmpID[] = $CurrMsg[2];
				} // end of for loop
			} // end of if statement

			if(in_array($EmpID, $ExistingEmpID)){
				echo "<p>This Employee ID has already submitted a guess!<br/>\n";
				echo "Your guess was not saved!</p>";
				$Subject = "";
			}
			else {

				$MessageRecord = "$FirstName~$LastName~$EmpID~$Department~$GuessOrn\n";
				$MessageFile = fopen("ContestData/decor.txt", "ab");

				if($MessageFile === FALSE){
					echo "<p>There was an error saving your guess!</p>\n";
				}
				else{
					fwrite($MessageFile, $MessageRecord);
					fclose($MessageFile);
					echo "<p>Your guess has been saved.</p>\n";
				}
			}
		}
		else{
			$FirstName = "";
			$LastName = "";
			$EmpID = "";
			$Department = "";
			$GuessOrn = "";
		}
	 ?>

	 <h1>Guess the Tree Decorations!</h1>
	 <p>Win a prize, guess the number ornaments, lights and garland strands on the tree!</p>
	 <ul>
	 	<li>Go into the kitchen and see the real thing.</li>
	 	<li>Remember COVID-19! No Touching!</li>
	 	<li>One guess per person ONLY!</li>
	 </ul>
	 <hr/>
	 <form action="ornaments.php" method="POST">
	 	
	 	<label style="font-weight: bold;">First Name:</label>
	 	<input type="text" name="fname" value="<?php echo $FirstName; ?>" /><br/>

	 	<label style="font-weight: bold;"> Last Name:</label>
	 	<input type="text" name="lname" value="<?php echo $LastName; ?>" /><br/>

	 	<label style="font-weight: bold;"> Employee ID:</label>
	 	<input type="text" name="empid" value="<?php echo $EmpID; ?>" /><br/>

	 	<label style="font-weight: bold;"> Department:</label>
	 	<input type="text" name="dept" value="<?php echo $Department; ?>" /><br/>

	 	<label style="font-weight: bold;"> Enter Your Guess:</label>
	 	<input type="text" name="guess_orn" value="<?php echo $GuessOrn; ?>" /><br/>

	 	<input type="submit" name="submit" value="Submit Guess" />
	 	<input type="reset" name="reset" value="Reset Form" />
	 </form>
	 <hr/>
	 <p id="button"><a href="home.html">Back to Contests</a></p>
</body>
</html>