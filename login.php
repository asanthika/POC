

<!DOCTYPE html>
<html>
<head>
	<title>Restuarant website</title>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/login-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <?php include 'php include/header.php';?>
   <style>
   	body{
   		background: url(img/background.jpg)no-repeat;
   		background-size: cover;
   	}
   </style>
   	
   	
</head>

<body>
<!-----navigationBar---->
<section id="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" ><img src="img/logo1.jpg "></a> 
<?php include 'php include/nav.php';?>
  
</nav>
</section>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<div class="loginbox">
		
		<h1>Login </h1>
		<form name="login">
			<p>User Name</p>
			<input type="text" id="" name="name" placeholder="Enter UserName">
			<p>Password</p>
			<input type="Password" id="" name="pass" placeholder="Enter Password">
			
			<a href=" ">LOG IN</a>
			<p>new member?</p><br/>
			<a href="register.php">Create a New Account</a>	
		</form>
	</div>
	
</form>
</body>

</html>

<?php
// include database connection
    include 'connect/config/database.php';


// Grab User submitted information
$name = $_POST["name"];
$pass = $_POST["pass"];

// Connect to the database
$con = mysqli_connect("localhost","root","");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysqli_select_db("test",$con);

$result = mysql_query("SELECT name, pass FROM account WHERE name = $name");

$row = mysql_fetch_array($result);

if($row["name"]==$email && $row["pass"]==$pass)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>