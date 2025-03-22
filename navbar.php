<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['user_id']) && ($currentPage == 'login.php' || $currentPage == 'registration.php')) {
    header('Location: index.php');
    exit();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Responsive Navbar</title>
<link rel="stylesheet" href="assets/css/style.css" />
<script src="assets/js/script.js" defer></script>
</head>
<body>
<nav class="nav_classname-navbar">
    <div class="nav_classname-logo">City Service</div>
    <ul class="nav_classname-nav-links" id="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="becomeAServiceProvider.php">Become A Service Provider</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="registration.php">Register</a></li>
      <?php endif; ?>
    </ul>
    <div class="nav_classname-menu-toggle" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
</nav>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Responsive Navbar</title>
<link rel="stylesheet" href="assets/css/style.css" />
<script src="assets/js/script.js" defer></script>
</head>
<body>
<nav class="nav_classname-navbar">
    <div class="nav_classname-logo">City Service</div>
    <ul class="nav_classname-nav-links" id="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
    <div class="nav_classname-menu-toggle" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>

</html> -->