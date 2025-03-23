<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Simple Login Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f7fa;
    }

    .container {
      background-color: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    .error {
      color: red;
      margin-top: -15px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<?php 
    session_start();
    include "../db.php";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM admin WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "<script>alert('Database error: " . mysqli_error($conn) . "'); window.location.href='login.php';</script>";
            exit;
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($password === $row['password']) { 
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_email'] = $row['email'];
                echo "<script>alert('Login successful!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Invalid password!'); window.location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('User not found!'); window.location.href='login.php';</script>";
        }
    }
?>

  <div class="container">
    <h2>Login</h2>
    <form id="loginForm" method="POST">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required />
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required />
      
      <p id="error" class="error"></p>

      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    // document.getElementById('loginForm').addEventListener('submit', function(event) {
    //   event.preventDefault();
    //   const email = document.getElementById('email').value;
    //   const password = document.getElementById('password').value;
    //   const errorElement = document.getElementById('error');

    //   if (email === 'test@example.com' && password === 'password123') {
    //     alert('Login successful!');
    //   } else {
    //     errorElement.textContent = 'Invalid email or password';
    //   }
    // });
  </script>
</body>
</html>
