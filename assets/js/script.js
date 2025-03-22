document.getElementById("menu-toggle").addEventListener("click", function () {
  document.getElementById("nav-links").classList.toggle("active");
});

let currentSlide = 0;
const slides = document.querySelectorAll(".slider_classname-slide");

function moveSlide(direction) {
  currentSlide += direction;
  if (currentSlide >= slides.length) currentSlide = 0;
  if (currentSlide < 0) currentSlide = slides.length - 1;
  document.getElementById("slider").style.transform = `translateX(-${
    currentSlide * 100
  }%)`;
}

document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const mobile = document.getElementById("mobile").value;
    const password = document.getElementById("password").value;

    const nameRegex = /^[A-Za-z ]{3,}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mobileRegex = /^[0-9]{10}$/;
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

    if (!nameRegex.test(name)) {
      alert("Please enter a valid name (at least 3 characters).");
      return;
    }

    if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    if (!mobileRegex.test(mobile)) {
      alert("Please enter a valid 10-digit mobile number.");
      return;
    }

    if (!passwordRegex.test(password)) {
      alert(
        "Password must be at least 6 characters long and include both letters and numbers."
      );
      return;
    }

    alert("Registration successful!");
    this.submit();
  });

//   service page
const providersData = {
  Plumbing: [
    { name: 'John Doe', mobile: '123-456-7890' },
    { name: 'Jane Smith', mobile: '987-654-3210' }
  ],
  Cleaning: [
    { name: 'Mike Johnson', mobile: '555-123-4567' },
    { name: 'Emily Davis', mobile: '444-987-6543' }
  ],
  Electrical: [
    { name: 'Robert Brown', mobile: '333-222-1111' },
    { name: 'Linda White', mobile: '777-888-9999' }
  ]
};

// Add event listener to button
document.getElementById('viewProvidersBtn').addEventListener('click', function() {
  const selectedService = document.getElementById('serviceDropdown').value;
  const serviceProvidersDiv = document.getElementById('serviceProviders');
  serviceProvidersDiv.innerHTML = ''; // Clear previous results

  // Check if service is selected and data exists
  if (selectedService && providersData[selectedService]) {
    const providers = providersData[selectedService];

    // Display each provider
    providers.forEach(provider => {
      const providerDiv = document.createElement('div');
      providerDiv.classList.add('view_service_classname-provider');
      providerDiv.innerHTML = `
        <p><strong>${provider.name}</strong></p>
        <p>Mobile: ${provider.mobile}</p>
      `;
      serviceProvidersDiv.appendChild(providerDiv);
    });
  } else {
    serviceProvidersDiv.textContent = 'No service providers available.';
  }
});

