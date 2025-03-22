<?php 
    include("navbar.php");
?>

<section class="login_classname-container">
    <h1 class="contact_classname-heading">Login</h1>
    <!-- <p class="contact_classname-description">We'd love to hear from you. Please fill out the form below and we'll get back to you as soon as possible.</p> -->

    <form id="contactForm" class="contact_classname-form">

      <label class="contact_classname-label">Email:</label>
      <input type="email" id="email" class="contact_classname-input" placeholder="Enter your email" />

      <label class="contact_classname-label">Password:</label>
      <input type="password" id="password" class="contact_classname-input" placeholder="Enter your password" />

      <button type="button" onclick="validateForm()" class="contact_classname-button">Submit</button>

        Not registered? <a href="registration.php">Register</a>
      <p id="errorMessage" class="contact_classname-error"></p>
    </form>
  </section>

  <?php 
    include("footer.php");
  ?>