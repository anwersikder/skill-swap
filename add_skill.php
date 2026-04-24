<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['add'])){
    $offer = $_POST['offer'];
    $want = $_POST['want'];

    mysqli_query($conn,"INSERT INTO skills(user_id,skill_offer,skill_want)
    VALUES('$user_id','$offer','$want')");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Skill</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="glass-card" style="width:400px;">

<h3 class="text-center mb-3">➕ Add Skill</h3>

<form method="POST">

<input class="form-control mb-2" name="offer" placeholder="Skill You Offer" required>

<input class="form-control mb-3" name="want" placeholder="Skill You Want" required>

<button class="btn btn-light w-100 btn-glow" name="add">Save Skill</button>

</form>

</div>

</div>

</body>
</html>