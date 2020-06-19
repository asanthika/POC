




<!DOCTYPE HTML>
<html>
<head>
	<title>Restuarant website</title>
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/login-style.css">
  <link rel="stylesheet" href="css/login2-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

      <?php include 'php include/header.php';?>
   
   	
   </head>

<body>

<!-----navigationBar---->
<section id="nav-bar">
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" ><img src="img/logo1.jpg "></a> 

  <?php include 'php include/nav.php';?>
  </div>
</nav>
</section>


           



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    
<div class="header">
  <h2>Register</h2>
</div>
<form method="post" action="">
  <div class="input-group">
    <label>Username</label>
    <input type="text" name="name" value="">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="">
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="pass">
  </div>
  
  <table class='table table-hover table-responsive table-bordered'>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href="connect/Admin_home_page.php" class='btn btn-danger'>Back to admin home page </a>
            </td>
        </tr>
  <p>
    Already a member? <a href="login.php">Sign in</a>
  </p>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>


<?php
if($_POST){
 
    // include database connection
    include 'connect/config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO account SET name=:name, email=:email, pass=:pass, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $pass=htmlspecialchars(strip_tags($_POST['pass']));
 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>







