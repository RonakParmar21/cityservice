<?php 
    include("navbar.php"); 
?>

<section class="slider_classname-slider-container">
    <div class="slider_classname-slider" id="slider">
      <div class="slider_classname-slide" style="background-image: url('https://images.pexels.com/photos/29226620/pexels-photo-29226620/free-photo-of-professional-plumber-installing-a-radiator-pipe.jpeg?auto=compress&cs=tinysrgb&w=600');">
        <h2>Plumbing Services</h2>
        <p>Get expert plumbing services at your doorstep.</p>
      </div>
      <div class="slider_classname-slide" style="background-image: url('https://images.pexels.com/photos/4239037/pexels-photo-4239037.jpeg?auto=compress&cs=tinysrgb&w=600');">
        <h2>Cleaning Services</h2>
        <p>Professional cleaning solutions for your home or office.</p>
      </div>
      <div class="slider_classname-slide" style="background-image: url('https://images.pexels.com/photos/7641361/pexels-photo-7641361.jpeg?auto=compress&cs=tinysrgb&w=600');">
        <h2>Electrical Services</h2>
        <p>Reliable electricians available 24/7.</p>
      </div>
    </div>
    <button class="slider_classname-prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="slider_classname-next" onclick="moveSlide(1)">&#10095;</button>
  </section>

  <section class="service_provide_classname-services-container">
    <h1 class="service_provide_classname-title">Services We Provide</h1>
    <p class="service_provide_classname-description">Explore our wide range of services tailored to meet your needs.</p>

    <div class="service_provide_classname-service-list">
      <div class="service_provide_classname-service-card">
        <img src="https://images.pexels.com/photos/29226620/pexels-photo-29226620/free-photo-of-professional-plumber-installing-a-radiator-pipe.jpeg" alt="Plumbing Services" />
        <h2>Plumbing Services</h2>
        <p>Get expert plumbing services at your doorstep.</p>
      </div>

      <div class="service_provide_classname-service-card">
        <img src="https://images.pexels.com/photos/4239037/pexels-photo-4239037.jpeg" alt="Cleaning Services" />
        <h2>Cleaning Services</h2>
        <p>Professional cleaning solutions for your home or office.</p>
      </div>

      <div class="service_provide_classname-service-card">
        <img src="https://images.pexels.com/photos/7641361/pexels-photo-7641361.jpeg" alt="Electrical Services" />
        <h2>Electrical Services</h2>
        <p>Reliable electricians available 24/7.</p>
      </div>
    </div>
  </section>

  <section class="about_section_classname-container">
    <h1 class="about_section_classname-heading">About Us</h1>
    <p class="about_section_classname-description">Welcome to City Service, your one-stop solution for all your service needs. We connect you with trusted professionals offering a wide range of services, including plumbing, electrical repairs, cleaning, and much more. Our mission is to provide you with convenient and reliable solutions for your home and business needs.</p>

    <div class="about_section_classname-grid">
      <div class="about_section_classname-card">
        <h2 class="about_section_classname-title">Our Mission</h2>
        <p class="about_section_classname-text">We aim to deliver high-quality services with a focus on customer satisfaction and reliability. Our goal is to make your life easier by connecting you with experienced professionals in your area.</p>
      </div>

      <div class="about_section_classname-card">
        <h2 class="about_section_classname-title">Why Choose Us?</h2>
        <ul class="about_section_classname-list">
          <li>Verified and experienced service providers</li>
          <li>Affordable pricing</li>
          <li>24/7 customer support</li>
          <li>Quick and easy booking</li>
        </ul>
      </div>
    </div>

    <button class="about_section_classname-cta-button"><a href="about.php">Learn More</a></button>
  </section>

  <?php 
    include("footer.php");
  ?>

