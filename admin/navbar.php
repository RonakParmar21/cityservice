<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid d-flex justify-content-between">
    <!-- Logo Section -->
    <a class="navbar-brand" href="#">Admin Panel</a>
    
    <!-- Navbar Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Menu Section -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addService.php">Add Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewService.php">View Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewContactDetails.php">View Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addAdminUser.php">Add Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewAdmin.php">View Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewRegisteredUser.php">Registered User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="approveService.php">Approve Services</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">View Inquiry</a>
        </li> -->
        <?php if (isset($_SESSION['admin_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
