<?php
require "koneksi.php";
session_start();

if (isset($_POST["submit-2"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $industry = $_POST["sector"];
  $address = $_POST["address"];
  $password = md5($_POST["pw"]);
  $website = $_POST["website"];
  // $logo = $_FILES["logo"]["tmp_name"];
  $desc = $_POST["desc"];
  $confirm_pass = $_POST["pw2"];

  $duplicate = mysqli_query(
    $conn,
    "SELECT * FROM user_company WHERE company_email = '$email'"
  );

  if (mysqli_num_rows($duplicate) > 0) {
    $errorEmail = true;
  } else {
    if ($password == $confirm_pass) {
      // Masukkan ke database dengan menggunakan parameterisasi query
      $query = "INSERT INTO user_company (company_name, company_email, company_number, industry, location, company, password, website) VALUES('$name','$email','$number','$industry','$address',true,'$password', '$website')";
      mysqli_query($conn, $query);

      // Ambil data untuk disimpan ke dalam session
      $query = "SELECT * FROM user_company WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($conn, $query);
      $user = mysqli_fetch_assoc($result); // Mengambil data user sebagai array
      $_SESSION["user"] = $user;
      $_SESSION["company"] = true;
      echo "<script>alert('registrasi berhasil');</script>";
      header("Location: comp_profile.php");
      exit();
    } else {
      $errorPW = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="Assets/img/titleLogo.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <script src="jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" href="Assets/css/comp_register.css" />
    <link rel="stylesheet" href="Assets/css/navbar.css" />
    <link rel="stylesheet" href="Assets/css/footer.css" />
    <link rel="stylesheet" href="Assets/css/root.css" />

    <title>Career Seeker</title>
  </head>

  <body class="home">
    <div id="nav-bg"></div>
    <nav class="navbar navbar-expand-lg">
      <div class="nav container-xxl">
        <a href="home.php">
          <img src="Assets/img/Logo.png" alt="" />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vacancy.php">Vacancy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="career-tips.php">Career Tips</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Help
              </a>
              <ul class="dropdown-menu">
                <li>s
                  <a class="dropdown-item" href="#">FAQ</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Contact Us</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <a href="student_register.php" class="login collapse show">
          <!-- Not Logged In -->
          <button type="button" id="btn-signin">
            Register As Employer
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </a>
        <a href="profile-seeker" class="profile collapse">
          <!-- Not Logged In -->
          <span class="material-icons md-48"> account_circle </span>
          <span class="profile">My Profile</span>
        </a>
      </div>
    </nav>
    <div class="hero container-fluid">
      <div class="image-copy-content">
        <img src="Assets/img/register.png" alt="" />
        <div class="copy">
          <p class="text-title">Discover Endless Opportunities With Us</p>
          <p class="text-desc">
            Lorem ipsum dolor sit amet consectetur. Fermentum id facilisis
            ultrices aliquet. Semper in euismod cursus euismod non ornare turpis
            sit a. Molestie lectus nullam proin justo faucibus pharetra
            facilisis. Consectetur iaculis senectus pellentesque sem a. Libero
            donec nullam sed in pretium nulla massa nunc pulvinar. Tortor enim
            turpis fringilla pellentesque. Blandit maecenas ultricies mauris
            erat cras lectus nisl. Dictum enim diam vel libero suspendisse eget
            scelerisque. Diam lectus pellentesque sed scelerisque.
          </p>
        </div>
      </div>

      <div class="register-content">
        <div class="hero-text">Register as Company</div>
        <form class="form" method="post" action="">
          <label for="name">Name</label>
          <div class="usrpw">
            <input
              id="name"
              class="input"
              name="name"
              placeholder="Enter Company Name"
              required=""
              type="text"
            />
          </div>
          <label for="email">Email</label>
          <div class="usrpw">
            <input
              id="email"
              name="email"
              class="input"
              placeholder="Enter Company Email"
              required=""
              pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
              type="text"
            />
          </div>
          <label for="number">Phone Number</label>
          <div class="usrpw">
            <input
              id="number"
              name="number"
              class="input"
              placeholder="Enter Company Phone Number"
              required=""
              type="number"
            />
          </div>
          <label for="address">Address</label>
          <div class="usrpw">
            <input
              id="address"
              name="address"
              class="input"
              placeholder="Enter Company Address"
              required=""
              type="text"
            />
          </div>
          <label for="sector">Industrial Sector</label>
          <div class="usrpw">
            <select
              id="sector"
              class="input"
              required=""
              name="sector"
              onchange="changeColor()"
            >
              <option value="none" disabled selected>
                Select Industrial Sector
              </option>
              <option value="sector-1">Information Technology (IT)</option>
              <option value="sector-2">Finance & Banking</option>
              <option value="sector-3">Health & Medicine</option>
              <option value="sector-4">Trade & E-Commerce</option>
              <option value="sector-5">Manufacturing & Engineering</option>
              <option value="sector-6">Marketing & Advertising</option>
              <option value="sector-7">Entertainment & Media</option>
              <option value="sector-8">Tourism & Hospitality</option>
            </select>
          </div>
          <label for="desc">Add Description</label>
          <div class="usrpw">
            <input
              id="desc"
              name="desc"
              class="input"
              placeholder="Enter Company Description"
              required=""
              type="text"
            />
          </div>
          <label for="logo">Logo</label>
          <div class="usrpw">
            <input
              id="logo"
              name="logo"
              class="custom-file-input"
              placeholder="Enter Company Logo"
              
              type="file"
              accept="image/png, image/jpeg"
            />
          </div>
          
          <label for="website">Website</label>
          <div class="usrpw">
            <input
              id="website"
              name="website"
              class="input"
              placeholder="Enter Company Website"
              type="text"
            />
          </div>
          <label for="pw">Password</label>
          <div class="usrpw">
            <input
              id="pw"
              name="pw"
              class="input"
              placeholder="Enter Your Password"
              required=""
              type="password"
            />
          </div>
          <label for="pw2">Re-enter Password</label>
          <div class="usrpw">
            <input
              id="pw2"
              name="pw2"
              class="input"
              placeholder="Re-enter Your Password"
              required=""
              type="password"
            />
          </div>
          <div>
            <input type="checkbox" />
            I agree to the
            <a href="register.php" class="tac">terms and conditions</a>
          </div>
          <button id="btn-login" type="submit" name="submit-2">
            Register
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </form>
      </div>
    </div>

    <footer class="footer container-fluid">
      <div id="connect">
        Connect With Us
        <div class="social-icon">
          <a href="linked.com"
            ><img src="{{ asset('icon/linkedin.png') }}" alt=""
          /></a>
          <a href="facebook.com"
            ><img src="{{ asset('icon/fb.png') }}" alt=""
          /></a>
          <a href="twitter.com"
            ><img src="{{ asset('icon/twt.png') }}" alt=""
          /></a>
        </div>
      </div>

      <div id="explore">
        Explore
        <ul class="navigation">
          <li>
            <a href="#">Company List</a>
          </li>
          <li>
            <a href="#">Career Tips</a>
          </li>
          <li>
            <a href="#">Testimonials</a>
          </li>
        </ul>
      </div>

      <div id="support">
        Support
        <ul class="navigation">
          <li>
            <a href="#">FAQ</a>
          </li>
          <li>
            <a href="#">Contact Us</a>
          </li>
          <li>
            <a href="#">Visit Us</a>
          </li>
        </ul>
      </div>

      <div id="copyright">
        <a href=""><img src="{{ asset('img/Logo-outline.png') }}" alt="" /></a>
        © 2023 Career Seeker, All Rights Reserved.
      </div>
    </footer>

    <script src="Assets/js/logic.js"></script>
    <script src="Assets/js/register.js"></script>
    <script>
      function changeColor() {
        var select = document.getElementById("sector");
        var selectedOption = select.options[select.selectedIndex];

        if (selectedOption.value == "none") {
          select.style.color = "#1a1a1a5d";
        } else {
          select.style.color = "var(--primary-color)";
        }
      }
      changeColor();
    </script>
  </body>
</html>
