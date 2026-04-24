<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar navbar-dark bg-dark px-3">

    <!-- Left side -->
    <span class="navbar-brand">💡Skill Swap</span>

    <!-- Right side -->
    <div>

        <a href="profile.php?id=<?= $_SESSION['user_id'] ?>" 
           class="btn btn-warning btn-sm me-2">
           👤 My Profile
        </a>

        <a href="logout.php" class="btn btn-danger btn-sm">
           Logout
        </a>

    </div>

</nav>

<div class="container text-center mt-5">

<h2 class="text-white mb-4">Dashboard</h2>

<div class="row justify-content-center">

<div class="col-md-3">
<a href="add_skill.php">
<div class="dashboard-card">➕ Add Skill</div>
</a>
</div>

<div class="col-md-3">
<a href="search.php">
<div class="dashboard-card">🔍 Search Skills</div>
</a>
</div>

<div class="col-md-3">
<a href="match.php">
<div class="dashboard-card">🤝 Matches</div>
</a>
</div>

</div>

</div>

</body>
</html>