<?php
if (isset($_SESSION["login"])) {
  header("Location: search.php"); //jika sudah login sebagai seeker
  exit();
} elseif (isset($_SESSION["company"])) {
  header("Location: comp_profile.php"); //jika sudah login sebagai company
}
if (isset($_POST["submit"])) {
  require "koneksi.php";
  session_start();
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $query = "SELECT * FROM user_seeker WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 0) {
    $query = "SELECT * FROM user_company WHERE company_email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
  }

  // FILE INI BELUM BISA BUAT LOGIN COMPANY NYA!!!
  if (mysqli_num_rows($result) > 0) {
    // Jika login berhasil
    $user = mysqli_fetch_assoc($result); // Mengambil data user sebagai array asosiatif
    // Menyimpan data user dalam session
    $_SESSION["user"] = $user;
    if ($user["company"] == false) {
      $_SESSION["login"] = true;
      header("Location: search.php");
    } else {
      $_SESSION["company"] = true;
      header("Location: comp_profile.php");
    }
    //start session

    // Jika login berhasil, redirect ke halaman home.html
    
    exit(); // Penting untuk menghentikan eksekusi skrip setelah mengarahkan pengguna
  } else {
    // Jika login tidak berhasil, tampilkan pesan kesalahan
    $error = true;
    // header("Location: user_login.php");
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

        <link rel="stylesheet" href="Assets/css/login.css" />
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
                            <a class="nav-link" aria-current="page" href="home.php"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vacancy.php">Vacancy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="career-tips.php"
                                >Career Tips</a
                            >
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
                                    <a class="dropdown-item" href="#"
                                        >Contact Us</a
                                    >
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <a href="login" class="login collapse">
                    <!-- Not Logged In -->
                    <button type="button" id="btn-signin">
                        Sign In
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
            <div class="hero-text">Login</div>
            <form class="form" method="post" action="">
            <?php if (isset($error)): ?>
                <p style="color : red; font: var(--primary-font);">Password or Email Incorrect !</p>
            <?php endif; ?>
                <div class="usrpw">
                    <img src="Assets/icon/username.png" alt="" />
                    <label for="email"></label>
                    <input
                        id="email"
                        name="email"
                        class="input"
                        placeholder="Enter Your Email"
                        required=""
                        type="text"
                    />

                    
                    <button class="reset" type="reset">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </button>
                </div>
                <div class="usrpw">
                    <button>
                        <img src="Assets/icon/password.png" alt="" />
                    </button>
                    <label for="password"></label>
                    <input
                        id="password"
                        name="password"
                        class="input"
                        placeholder="Enter Your Password"
                        required=""
                        type="password"
                    />
                    <button class="reset" type="reset">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            ></path>
                        </svg>
                    </button>
                </div>

                <!-- <div class="usrpw">
                <label for="passion">Passion:</label>
        <select class="form-control" id="passion" name="passion" required>
            <option value="IT">IT</option>
            <option value="Marketing">Marketing</option>
        </select>
                </div> -->


                <button id="btn-login" class="mt-5" type="submit" name="submit">
                    Login
                    <div class="arrow-wrapper">
                        <div class="arrow"></div>
                    </div>
                </button>
                <p>Does not have one? <a href="student_register.php">create here</a></p>
            </form>
        </div>
        <footer class="footer container-fluid">
            <div id="connect">
                Connect With Us
                <div class="social-icon">
                    <a href="linked.com"
                        ><img src="Assets/icon/linkedin.png" alt=""
                    /></a>
                    <a href="facebook.com"
                        ><img src="Assets/icon/fb.png" alt=""
                    /></a>
                    <a href="twitter.com"
                        ><img src="Assets/icon/twt.png" alt=""
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
                <a href=""
                    ><img src="Assets/img/Logo-outline.png" alt=""
                /></a>
                © 2023 Career Seeker, All Rights Reserved.
            </div>
        </footer>

        <script src="Assets/js/logic.js"></script>
        <script src="Assets/js/login.js"></script>
    </body>
</html>
