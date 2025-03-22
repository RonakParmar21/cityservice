<?php 
    include("navbar.php");
?>
<!-- <body class="view_service_classname-body"> -->
  <header class="view_service_classname-header1">
    <h1>View Services</h1>
    <p>Select a service to see available providers.</p>
  </header>

  <section class="view_service_classname-container">
    <label for="serviceDropdown" class="view_service_classname-label">Choose a Service:</label>
    <select id="serviceDropdown" class="view_service_classname-dropdown">
      <option value="">Select a Service</option>
      <option value="Plumbing">Plumbing</option>
      <option value="Cleaning">Cleaning</option>
      <option value="Electrical">Electrical</option>
    </select>

    <button id="viewProvidersBtn" class="view_service_classname-button">View Providers</button>

    <div id="serviceProviders" class="view_service_classname-providers"></div>
  </section>

  <script src="script.js" defer></script>

  <?php 
    include("footer.php");
  ?>