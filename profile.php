<?php
include 'db.php';

$id = $_GET['id'];

$user = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM users WHERE id='$id'")
);

$skills = mysqli_query($conn,"SELECT * FROM skills WHERE user_id='$id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5 d-flex justify-content-center">

<div class="glass-card text-center" style="max-width:500px; width:100%;">

<h2 class="mb-2"><?= $user['name'] ?></h2>

<p class="mb-3"><?= $user['email'] ?></p>

<hr>

<h5 class="mb-3">💡Skills</h5>

<?php while($s = mysqli_fetch_assoc($skills)){ ?>
<span class="badge bg-light text-dark m-1 p-2">
<?= $s['skill_offer'] ?>
</span>
<?php } ?>

<hr>

<a href="mailto:<?= $user['email'] ?>" class="btn btn-light btn-glow w-100">
📩 Contact User
</a>

</div>

</div>

</body>
</html>