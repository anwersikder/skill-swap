<?php
include 'db.php';

if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users(name,email,password)
    VALUES('$name','$email','$pass')");

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="glass-card" style="width:350px;">

<h3 class="text-center mb-3">Register</h3>

<form method="POST">

<input class="form-control mb-2" name="name" placeholder="Name" required>

<input class="form-control mb-2" name="email" placeholder="Email" required>

<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

<button class="btn btn-light w-100 btn-glow" name="register">Register</button>

</form>

</div>

</div>

</body>
</html>