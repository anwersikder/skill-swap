<?php
include 'db.php';

$result = null;

if(isset($_GET['q'])){
    $q = $_GET['q'];

    $result = mysqli_query($conn,"
    SELECT users.id, users.name, skills.skill_offer
    FROM skills
    JOIN users ON skills.user_id = users.id
    WHERE skills.skill_offer LIKE '%$q%'
    ");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Skills</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5 fade-in">

<h2 class="text-white text-center mb-4 float">🔍 Search Skills</h2>

<form method="GET" class="text-center mb-4">

<input class="form-control w-50 mx-auto mb-3" name="q" placeholder="Search skill...">

<button class="btn btn-light btn-glow">Search</button>

</form>

<div class="row justify-content-center">

<?php
if($result && mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-4">

<div class="glass-card hover-card text-center mb-4">

<!-- CLICKABLE NAME -->
<a href="profile.php?id=<?= $row['id'] ?>" class="text-white text-decoration-none">
<h4 class="mb-2"><?= $row['name'] ?></h4>
</a>

<p>💡 <b><?= $row['skill_offer'] ?></b></p>

</div>

</div>

<?php
}
} else if(isset($_GET['q'])){
    echo "<p class='text-white text-center'>No results found 😢</p>";
}
?>

</div>

</div>

</body>
</html>