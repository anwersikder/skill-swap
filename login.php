<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $res=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $row=mysqli_fetch_assoc($res);

    if($row && password_verify($pass,$row['password'])){
        $_SESSION['user_id']=$row['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error="Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="glass-card" style="width:350px;">

<h3 class="text-center mb-3">Login</h3>

<?php if(isset($error)) echo "<p class='text-danger text-center'>$error</p>"; ?>

<form method="POST">

<input class="form-control mb-2" name="email" placeholder="Email" required>

<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

<button class="btn btn-light w-100 btn-glow" name="login">Login</button>

</form>

</div>

</div>

</body>
</html>