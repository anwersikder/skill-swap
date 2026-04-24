<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$q = "
SELECT u.name, u.email, s2.skill_offer
FROM skills s1
JOIN skills s2
ON s1.skill_offer = s2.skill_want
AND s1.skill_want = s2.skill_offer
JOIN users u ON u.id = s2.user_id
WHERE s1.user_id = '$user_id'
";

$result = mysqli_query($conn,$q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Matches</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5 fade-in">

<h2 class="text-white text-center mb-4 float">🤝 Your Matches</h2>

<div class="row justify-content-center">

<?php
if(mysqli_num_rows($result) == 0){
    echo "<p class='text-white text-center'>No matches found 😢</p>";
}

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-4">

<!-- GLASS MATCH CARD -->
<div class="glass-card hover-card text-center mb-3">

<h4 class="mb-2"><?= $row['name'] ?></h4>

<p><b>Skill:</b> <?= $row['skill_offer'] ?></p>

<p class="mb-3"><b>Email:</b> <?= $row['email'] ?></p>

<!-- CONTACT BUTTON -->
<a href="mailto:<?= $row['email'] ?>" class="btn btn-light btn-glow w-100">
📩 Contact
</a>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>