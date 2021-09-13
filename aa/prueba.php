<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>
        bueeenaa <?php
        echo $_POST["name"];?>
        tu correo es:<?php
        echo $_POST["email"] ;
        ?>
    </p>
    <?php 

	$conexion=mysqli_connect('localhost','root','','marvel');

 ?>
 <table border="1" >
		<tr>
			<td>id</td>
			<td>nombre</td>
			<td>tim</td>
			<td>gender</td>
			<td>Hometown</td>	
            <td>figth skills</td>
		</tr>

		<?php 
		$sql="SELECT * from characters";
		$result=mysqli_query($conexion,$sql);
        var_dump($result);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID'] ?></td>
			<td><?php echo $mostrar['Name'] ?></td>
			<td><?php echo $mostrar['Alignment'] ?></td>
			<td><?php echo $mostrar['Gender'] ?></td>
			<td><?php echo $mostrar['Hometown'] ?></td>
            <td><?php echo $mostrar['Fighting_Skills'] ?></td>
		</tr>
	<?php 
	}
	 ?>


     
	</table>
    
<form action="prueba.php" method="post">
     Name: <input type="text" name="nom"><br>
     Alignment: <input type="text" name="alig"><br>
     gender: <input type="text" name="gender"><br>
     Hometown: <input type="text" name="home"><br>
     figth_skills: <input type="text" name="skills"><br>
<input id="input" type="submit">


     
    <?php
    var_dump($_POST["nom"]);
	$con=mysqli_connect("localhost","root","","marvel");
    $sql="insert into characters(Name,Alignment,Gender,Hometown,Fighting_Skills)
        values('"+$_POST["nom"]+"','"+$_POST["alig"]+"','"+$_POST["gender"]+"','"+$_POST["home"]+"',
        '"+$_POST["skills"]+"')";
    $x=mysqli_query($con,$sql);
	
    // 



	//DECLARACIONES PREPARADAS Y PARAMETROS ENLAZADOS

	// $stmt = mysqli_prepare($link, "INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
	// mysqli_stmt_bind_param($stmt, 'sssd', $code, $language, $official, $percent);
	
	// $code = 'DEU';
	// $language = 'Bavarian';
	// $official = "F";
	// $percent = 11.2;
	
	// /* execute prepared statement */
	// mysqi_stmt_execute($stmt);
	
	// printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));




// LEER DATOS

// 	$sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }



	//



// 
// <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<!-- 
<?php
// define variables and set to empty values
// $nameErr = $emailErr = $genderErr = $websiteErr = "";
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (empty($_POST["name"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["name"]);
//   }

//   if (empty($_POST["email"])) {
//     $emailErr = "Email is required";
//   } else {
//     $email = test_input($_POST["email"]);
//   }

//   if (empty($_POST["website"])) {
//     $website = "";
//   } else {
//     $website = test_input($_POST["website"]);
//   }

//   if (empty($_POST["comment"])) {
//     $comment = "";
//   } else {
//     $comment = test_input($_POST["comment"]);
//   }

//   if (empty($_POST["gender"])) {
//     $genderErr = "Gender is required";
//   } else {
//     $gender = test_input($_POST["gender"]);
//   }
// }
// ?>
 -->



	<!-- // VALIDAR DATOS -->


<!-- // 	<?php 
// // define variables and set to empty values
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $name = test_input($_POST["name"]);
//   $email = test_input($_POST["email"]);
//   $website = test_input($_POST["website"]);
//   $comment = test_input($_POST["comment"]);
//   $gender = test_input($_POST["gender"]);
// }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
// ?>

	
    ?>
    </form>

    <?php 
		$sql="SELECT * from characters";
		$result=mysqli_query($conexion,$sql);
        var_dump($result);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['ID'] ?></td>
			<td><?php echo $mostrar['Name'] ?></td>
			<td><?php echo $mostrar['Alignment'] ?></td>
			<td><?php echo $mostrar['Gender'] ?></td>
			<td><?php echo $mostrar['Hometown'] ?></td>
            <td><?php echo $mostrar['Fighting_Skills'] ?></td>
		</tr>
	<?php 
	}
	 ?>


    
</body>
</html>