<?php
session_start();


if (isset($_SESSION["login"])) {
  $loggedIn = $_SESSION["login"];
  $user = $_SESSION["user"];

 
  
  


}
else{
  // header("Location: home.php");
 

}
$user2 = isset($_SESSION["user"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="Assets/img/Logo.png" />
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
    <style>
        /* CSS untuk menyembunyikan tabel */
        .hidden-table {
            display: none;
        }
    </style>
    <title>Career Seeker</title>
  </head>

  <body class="home">
    <div id="background1"></div>
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
                <li><a class="dropdown-item" href="#">FAQ</a></li>
                <li><a class="dropdown-item" href="#">Contact Us</a></li>
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
      <!-- <div class="hero-text">Explore Endless Internship Opportunities</div>

      <form class="form">
        <button>
          <img src="Assets/icon/Search.png" alt="" />
        </button>
        <input
          class="input"
          placeholder="Search Opportunities"
          required=""
          type="text"
        /> -->

        
      </form>

      <div class="container mt-5">
      <?php if (isset($user2) && $user2) : ?>
        <table class="table table-striped">
    <Email style="font-size: 30px;" class="hero-text" >Welcome :  <?= $user["email"] ?></Email>
        <thead>
            <tr>
                <!-- <th>No</th> -->
                <th>Job Type</th>
                <th>Experience</th>
                <th>Salary</th>
                <th>Location</th>
                <th>Country</th>
                <th>Work Type</th>
            </tr>
        </thead>
        <tbody>
            <?php
              
              if (isset($_SESSION["user"]["last_education"])) {
                $last_education = $_SESSION["user"]["last_education"];

                $koneksi = new mysqli("localhost", "root", "", "db_project");

                // Periksa koneksi
                if ($koneksi->connect_error) {
                    die("Koneksi gagal: " . $koneksi->connect_error);
                }
             
                  // maunya buat biar kalau login as last education : (1- IT, tabel isi job type it aja yang muncul)
                  
                    $query = "SELECT id_dataset, job_dataset, experience, salary, location, country, work_type, job_type FROM tb_dataset 
                          
                    INNER JOIN tb_job ON tb_dataset.job_dataset = tb_job.id
               
                      WHERE job_dataset = '$last_education'
                    
                    ";

                    
                  
                
               
                $result = $koneksi->query($query);

                // Tampilkan dalam tabel
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // echo "<td>" . $row['id_dataset'] . "</td>";
                     
                    echo "<td>" . $row['job_type'] . "</td>";
                    echo "<td>" . $row['experience'] . "</td>";
                    echo "<td>" . $row['salary'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['work_type'] . "</td>";
                    echo "</tr>";
                }
              }
                // Tutup koneksi
                $koneksi->close();
            ?>
        </tbody>
    </table>



    <?php else : ?>
      <Email style="font-size: 30px;" class="hero-text" >
      Please Login To see Table !
      </Email>
    <?php endif; ?>

        


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
      function setActiveNavbar() {
        var currentLocation = window.location.href;
        var homeLink = document.querySelector(
          ".navbar-nav .nav-item:nth-child(2) .nav-link"
        );
        var link = document.querySelector(".navbar-nav .nav-item:nth-child(2)");
        if (currentLocation.indexOf("search") !== -1) {
          homeLink.classList.add("active");
          link.classList.add("active");
        }
      }

      setActiveNavbar();
    </script>
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
