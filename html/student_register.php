<?php
require "koneksi.php";
session_start();
if (isset($_POST["submit"])) {
  $fullname = $_POST["fullname"];
  $dob = $_POST["DoB"];
  $email = $_POST["email"];
  $last_education = $_POST["last-edu"];
  $address = $_POST["address"];
  $phone_number = $_POST["number"];
  $password = md5($_POST["pw"]);
  $confirm_pass = md5($_POST["pw2"]);

  $duplicate = mysqli_query(
    $conn,
    "SELECT * FROM user_seeker WHERE email = '$email'"
  );

  if (mysqli_num_rows($duplicate) > 0) {
    $errorEmail = true;
  } else {
    if ($password == $confirm_pass) {
      //masukan ke database
      $query = "INSERT INTO user_seeker (fullname, birth_date, email, last_education, address, phone_number, password, company) VALUES('$fullname','$dob','$email','$last_education','$address','$phone_number','$password', false)";
      mysqli_query($conn, $query);
      //ambil data untuk simpan ke session
      $query = "SELECT * FROM user_seeker WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($conn, $query);
      $user = mysqli_fetch_assoc($result); // Mengambil data user sebagai array asosiatif
      // Menyimpan data user dalam session
      $_SESSION["user"] = $user;
      // Mengambil data user sebagai array asosiatif
      // Menyimpan data user dalam session
      $_SESSION["login"] = true;
      //direct
      header("Location: home.php");
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

    <link rel="stylesheet" href="Assets/css/register.css" />
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
              <a class="nav-link" href="#">Vacancy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Career Tips</a>
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
                <li>
                  <a class="dropdown-item" href="#">FAQ</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Contact Us</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <a href="comp_register.php" class="login collapse show">
          <!-- Not Logged In -->
          <button type="button" id="btn-signin">
            Register As Company
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
        <div class="hero-text">Register as Employer</div>
        <form class="form" method="post" action="">
          <label for="fullname">Fullname</label>
          <div class="usrpw">
            <input
              id="fullname"
              class="input"
              name="fullname"
              placeholder="Enter Your Name"
              required=""
              type="text"
            />
          </div>
          <?php if (isset($errorEmail)): ?>
            <p style="color : red; font: var(--primary-font);">Email already used !</p>
          <?php endif; ?>
          <label for="email">Email</label>
          <div class="usrpw">
            <input
              id="email"
              name="email"
              class="input"
              placeholder="Enter Your Email"
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
              placeholder="Enter Your Phone Number"
              required=""
              type="number"
            />
          </div>
          <label for="DoB">Date of Birth</label>
          <div class="usrpw">
            <button></button>
            <input
              id="DoB"
              name="DoB"
              class="input"
              placeholder="Enter Your Date of Birth"
              required=""
              type="date"
            />
          </div>
          <label for="address">Address</label>
          <div class="usrpw">
            <input
              id="address"
              name="address"
              class="input"
              placeholder="Enter Your Address"
              required=""
              type="text"
            />
          </div>
          <label for="last-edu"> Passion </label>
          <div class="usrpw">
            <select
              id="last-edu"
              class="input"
              required=""
              name="last-edu"
              onchange="changeColor()"
            >
              <option value="none" disabled selected>
              Select Your Passion
              </option>
              <?php
                    // Gantilah bagian ini dengan koneksi ke database Anda
                    $koneksi = new mysqli("localhost", "root", "", "db_project");

                    // Periksa koneksi
                    if ($koneksi->connect_error) {
                        die("Koneksi gagal: " . $koneksi->connect_error);
                    }

                    // Query untuk mengambil data dari tabel (gantilah 'nama_tabel' sesuai dengan nama tabel Anda)
                    $query = "SELECT id, job_type FROM tb_job";
                    $result = $koneksi->query($query);

                    // Tampilkan data dalam elemen select
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['job_type'] . "</option>";
                    }

                    // Tutup koneksi
                    $koneksi->close();
                ?>
            </select>
          </div>
          <?php if (isset($errorPW)): ?>
            <p style="color : red; font: var(--primary-font);">Password does not match !</p>
          <?php endif; ?>
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
            <input type="checkbox" require/>
            I agree to the
            <a href="register.php" class="tac">terms and conditions</a>
          </div>
          <button id="btn-login" type="submit" name="submit">
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
        var select = document.getElementById("last-edu");
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
