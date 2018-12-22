<?php
// Initialize the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<title>Beer App Homepage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript">

 $(document).ready(function(){
		
		//Hide login and register button when user is signed in
		if ($('#sessionName').html() === "") { //checks if empty
			$("#loginMsg").hide();
			$("#logoutbutton").hide();
		} 
		
		if ($('#sessionName').html().length > 0) { //hide buttons if session name length > 0
        //$('#hidebutton').remove();
        $("#hidebutton").hide();
		$("#hidebutton2").hide();
		}
		
    });
</script>
</head>
<body>
<body background="bgimage2.gif">

  <script type="text/javascript">
    function logCheck(){
        if (sessionStorage.getItem('status') == null){
          alert("Please Login To Use This Feature")
        }
    }

  </script>

<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-2">
				<a href="logout.php" <button id="logoutbutton" type="submit" class="btn btn-secondary">Logout</button></a>
                <a href="User/Login.php" <button id="hidebutton" type="submit" class="btn btn-dark">Login</button></a>
            </li>
            <li class="nav-item mr-2">
				<h5 id="loginMsg" style="color:white; margin-top:7px;" >Hi, <b style="color:red;" id ="sessionName"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Thanks for logging in!</h5>
                <a href="User/Register.php" <button id="hidebutton2" type="submit" class="btn btn-dark">Register</button></a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item mr-2">
				<button onclick="logCheck()" type="submit" class="btn btn-danger">Favorites</button>
            </li>
            <li class="nav-item">
                <a href="Features/Beermenu.html" <button type="submit" class="btn btn-danger">Beer Menu</button></a>
            </li>
        </ul>
    </div>
</nav>
<br>
</br>
<img src="headerImage.png" alt="Chickies n Petes" style="justify-content: center;">
<img id="img2" src="smallScreen.gif" alt="Chickies n Petes" style="justify-content: center;">
<br>
</br>
<div class = "table-responive">
<table id="example" class="table table-hover" style="width:100%; font-weight:bold;">
<thead class = "thead-dark">
 <tr>
  <th>Name</th> 
  <th>Type</th>
  <th>Rating</th>
  <th>Price</th>
 </tr>
 <?php
define('DB_SERVER', 'chickiesandpetes-beertracker-mysqldbserver.mysql.database.azure.com');
define('DB_USERNAME', 'mysql@chickiesandpetes-beertracker-mysqldbserver');
define('DB_PASSWORD', 'Beeradmin1');
define('DB_NAME', 'beerdb');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT Name, Type, Rating, Price FROM drinks";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Type"] . "</td><td>"
. $row["Rating"]. "</td><td>" . "$" . $row["Price"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</div>
</body>
</html>
