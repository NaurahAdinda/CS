<?php
session_start();
if (isset($_SESSION["login"])) {
  $loggedIn = $_SESSION["login"];
  $user = $_SESSION["user"];
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

    <link rel="stylesheet" href="Assets/css/home.css" />
    <link rel="stylesheet" href="Assets/css/navbar.css" />
    <link rel="stylesheet" href="Assets/css/footer.css" />
    <link rel="stylesheet" href="Assets/css/root.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <title>Career Seeker</title>
  </head>

  <body class="home">
    <div id="background1"></div>
    <nav class="navbar navbar-expand-lg">
      <div class="nav container-xxl">
        <a href="">
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

        <a href="user_login.php" class="login">
          <!-- Not Logged In -->
          <button type="button" id="btn-signin">
            Sign In
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </a>
        <a href="user_profile.php" class="profile collapse">
          <!-- ogged In -->
          <span class="material-icons md-48"> account_circle </span>
          <span class="profile"><?= $user["fullname"] ?></span>
        </a>
      </div>
    </nav>

    <section class="hero container-fluid">
      <div class="hero-text">Explore Endless Internship Opportunities</div>
<!-- 
      <form class="form">
        <button>
          <img src="Assets/icon/Search.png" alt="" />
        </button>
        <input
          class="input"
          placeholder="Search Opportunities"
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
      </form> -->
    </section>
    <div id="background2"></div>
    
    <section class="web-description container-fluid">
      <div class="text-title">Empower Your Future</div>
      <div class="text-image">
        <p class="text-desc">
          Welcome to CareerSeeker.com, the leading online platform connecting job
          seekers with employers worldwide. Our user-friendly interface and
          advanced search features make it easy for you to find your dream job.
          Whether you're a recent graduate, an experienced professional, or
          looking for remote work opportunities, we've got you covered. Explore
          our vast database of job listings, curated from top companies in
          various industries. Create a profile, upload your resume, and receive
          personalized job recommendations. Stay updated with the latest job
          openings through our email alerts and notifications. At CareerSeeker.com,
          we are committed to helping you take the next step in your career.
          Start your job search today and let us connect you with your ideal
          job!
        </p>
        <img src="Assets/img/home1.png" alt="" />
      </div>
    </section>

    <section class="top-comp container-fluid">
      <div class="text-title">Top-rated Internship Firms</div>
      <div class="comp-cards">
        <div class="card comp-1" style="width: 346px">
          <img src="Assets/img/comp-1.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <div class="card-desc">
              <h1 class="card-title" style="color: #2d3648; font-size: 20px">
                Retail Banking Card Funding Officer
              </h1>
              <h1 class="card-title" style="color: #717d96; font-size: 16px">
                PT. Bank Mega, Tbk
              </h1>

              <h1
                class="card-title"
                style="color: #717d96; font-size: 16px; font-weight: 800"
              >
                Denpasar
              </h1>

              <p class="card-text" style="color: #717d96; font-size: 12px">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>

            <button id="btn-comp-card">
              <a
                href="#"
                class="bx bx-right-arrow-alt"
                style="color: #2d3648; transform: scale(2)"
              ></a>
            </button>
          </div>
        </div>
        <div class="card comp-2" style="width: 346px">
          <img src="Assets/img/comp-2.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <div class="card-desc">
              <h1 class="card-title" style="color: #2d3648; font-size: 20px">
                Retail Banking Card Funding Officer
              </h1>
              <h1 class="card-title" style="color: #717d96; font-size: 16px">
                PT. Bank Mega, Tbk
              </h1>

              <h1
                class="card-title"
                style="color: #717d96; font-size: 16px; font-weight: 800"
              >
                Denpasar
              </h1>

              <p class="card-text" style="color: #717d96; font-size: 12px">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>

            <button id="btn-comp-card">
              <a
                href="#"
                class="bx bx-right-arrow-alt"
                style="color: #2d3648; transform: scale(2)"
              ></a>
            </button>
          </div>
        </div>
        <div class="card comp-3" style="width: 346px">
          <img src="Assets/img/comp-1.png" class="card-img-top" alt="..." />
          <div class="card-body">
            <div class="card-desc">
              <h1 class="card-title" style="color: #2d3648; font-size: 20px">
                Retail Banking Card Funding Officer
              </h1>
              <h1 class="card-title" style="color: #717d96; font-size: 16px">
                PT. Bank Mega, Tbk
              </h1>

              <h1
                class="card-title"
                style="color: #717d96; font-size: 16px; font-weight: 800"
              >
                Denpasar
              </h1>

              <p class="card-text" style="color: #717d96; font-size: 12px">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p>
            </div>

            <button id="btn-comp-card">
              <a
                href="#"
                class="bx bx-right-arrow-alt"
                style="color: #2d3648; transform: scale(2)"
              ></a>
            </button>
          </div>
        </div>
      </div>
      <div class="comp-explore">
        <a href="">
          <button id="btn-explore">
            Explore
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </a>
      </div>
    </section>
    <footer class="footer container-fluid">
      <div id="connect">
        Connect With Us
        <div class="social-icon">
          <a href="linked.com"><img src="Assets/icon/linkedin.png" alt="" /></a>
          <a href="facebook.com"><img src="Assets/icon/fb.png" alt="" /></a>
          <a href="twitter.com"><img src="Assets/icon/twt.png" alt="" /></a>
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
    <script>
      var loginButton = document.querySelector('.login')
      var profileButton = document.querySelector('.profile')
      if("<?php echo $loggedIn; ?>" == 1){
        loginButton.classList.add("collapse");
        profileButton.classList.remove("collapse");
      }


    </script> 
  </body>
</html>
