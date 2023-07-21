<!DOCTYPE html>
<html>
<head>
  <title> HOME PAGE</title>
  <style>
    body {
      background-image:url("PharmaHome.png.jpeg");
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center; /* Center align the content */
    }
    
    h1 {
      color: blue; 
    
    }
    
    h2 {
      color: blue; /* Set h2 color to bright blue */
      margin-bottom: 20px; /* Add margin bottom for a bigger space */
    }
    
    label {
      color: blue; /* Set checkbox label color to bright blue */
    }
    
    h2#pharma-title {
      color: black; /* Set "Pharma Home Page" color to black */
      text-decoration: underline; /* Add underline to the text */
    }
    
    button {
      padding: 10px 20px; /* Increase button padding for a larger size */
      background-color: lightblue; /* Set button background color to light blue */
      color: darkgreen; /* Set button text color to dark green */
    }
    
    .improve-text {
      color: rgb(2, 2, 7); 
      font-size: 50px;
    }
    
    .select_option {
      color: rgb(2, 2, 7);
    }
    
    .pitch {
      color: black;
      font-size: 30px;
    }
    
    .admin-link {
      color: blue;
      font-size: 16px;
      margin-top: 10px;
    }
  </style>
  <script>
    function redirect() {
      var checkboxes = document.getElementsByName("options");
      var selectedOptions = [];

      checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
          selectedOptions.push(checkbox.value);
        }
      });

      if (selectedOptions.includes("option1")) {
        window.location.href = "PatientLogin.html";
      }
      if (selectedOptions.includes("option2")) {
        window.location.href = "DoctorLogin.html";
      }
      if (selectedOptions.includes("option3")) {
        window.location.href = "PharmacistLogin.html";
      }
    }
  </script>
</head>
<body>
  <h1>Welcome</h1>
  <h2 id="pharma-title">Pharma Home Page</h2>
  <p class="improve-text">We improve your healthcare experience</p>
  <p class="pitch">By bridging the gap between you and the healthcare professionals</p>
  <p class="select_option">Please select below how you would like to interact with the system</p>
  <h3>Select an option:</h3>
  <form>
    <label>
      <input type="checkbox" name="options" value="option1"> Patient
    </label>
    <label>
      <input type="checkbox" name="options" value="option2"> Doctor
    </label>
    <label>
      <input type="checkbox" name="options" value="option3"> Pharmacist
    </label>
  </form>
  <br><br>
  <button onclick="redirect()">Proceed to Login Page</button>
  <br>
  <a href="AdminLogin.html" class="admin-link">Admin Side</a>
</body>
</html>





