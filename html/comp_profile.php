<?php
session_start();
require "koneksi.php";

if (isset($_SESSION["login"])) {
  header("Location: user_profile.php");
  exit();
} elseif (!isset($_SESSION["company"])) {
  header("Location: user_login.php ");
}

if (isset($_POST["submit-update-2"])) {
  $name = $_POST["name"];
  $phone_number = $_POST["number"];
  $industry = $_POST["industry"];
  $address = $_POST["address"];
  $website = $_POST["website"];
  $desc = $_POST["desc"];

  $user = $_SESSION["user"];
  $email = $user["email"];
  $password = $user["password"];

  $duplicate = mysqli_query(
    $conn,
    "SELECT * FROM user_seeker WHERE email = '$email'"
  );

  $query = "UPDATE user_seeker SET fullname='$fullname', birth_date='$dob', last_education='$last_education', address='$address', phone_number='$phone_number' WHERE email='$email'";
  mysqli_query($conn, $query);

  $query = "SELECT * FROM user_seeker WHERE email = '$email' AND password = '$password'";
  if (mysqli_query($conn, $query)) {
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $_SESSION["user"] = $user;
    $pesan = "Data berhasil diperbarui";
    echo "<script>alert('" . $pesan . "');</script>";
    header("Location: user_profile.php");
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="Assets/css/profile.css" />
    <link rel="stylesheet" href="Assets/css/navbar.css" />
    <link rel="stylesheet" href="Assets/css/footer.css" />
    <link rel="stylesheet" href="Assets/css/root.css" />

    <title>Career Seeker</title>
  </head>
  <?php if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    // Mengakses data user
    $name = $user["company_name"];
    $email = $user["company_email"];
    $number = $user["company_number"];
    $industry = $user["industry"];
    $address = $user["location"];
    $website = $user["website"];
    // $logo = $user["logo"];
    $desc = $user["description"];
  } else {
    // Jika data user tidak ada dalam session, redirect ke halaman login
    header("Location: user_login.php");
    exit();
  } ?>
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

        <a href="login" class="login collapse">
          <!-- Not Logged In -->
          <button type="button" id="btn-signin">
            Sign In
            <div class="arrow-wrapper">
              <div class="arrow"></div>
            </div>
          </button>
        </a>

      </div>
    </nav>
    <div class="main-content">
      <div class="profile-menu">
        <a class="my-profile"
          ><button class="btn-sec active">My Profile</button></a
        >
        <a class="my-application"
          ><button class="btn-sec">Application List</button></a
        >
        <a class="logout"
          href="logout.php"><button class="btn-sec" style="color: #c47777">Logout</button></a
        >
      </div>
      <div class="v-line"></div>
      <div id="sec-1" class="sec-my-profile container-fluid">
        <div class="hero-text">My Profile</div>
        <div class="bio">
         <img src="Assets/img/profile.jpg" alt="" class="profile" />
          <div class="detail-info">
            <div class="fullname"><?php echo $name; ?></div>
            <div class="profession">Director</div>
            <div class="hometown"><?php echo $address; ?></div>
            <div class="self-bio">
                <?php echo $desc; ?>
            </div>
          </div>
          <a href=""><img src="Assets/icon/edit.png" alt="" />Edit</a>
        </div>
        <div class="personal-information">
            <p class="copy-1">Personal information</p>
            <div class="info">
                <div class="info-1">
                    <p class="title-2">Company Name</p>
                    <p class="text-desc"><?php echo $name; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Email</p>
                    <p class="text-desc"><?php echo $email; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Phone Number</p>
                    <p class="text-desc"><?php echo $number; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Industry</p>
                    <p class="text-desc"><?php echo $industry; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Address</p>
                    <p class="text-desc"><?php echo $address; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Website</p>
                    <p class="text-desc"><?php echo $website; ?></p>
                </div>
                <div class="info-1">
                    <p class="title-2">Description</p>
                    <p class="text-desc"><?php echo $desc; ?></p>
                </div>
            </div>
            <button id="edit-information"class="btn btn-success">Edit</button>
        </div>
        <div class="personal-information-edit">
            <form class="form" action="" method="post">
                <p class="copy-1">Personal information</p>
                <div class="info">
                    <div class="info-1">
                        <p class="title-2">Fullname</p>
                        <input name="name" class="text-desc" value="<?php echo $name; ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Phone Number</p>
                        <input name="number"class="text-desc" value="<?php echo $number; ?>" type="number"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Industry</p>
                        <input name="industry" class="text-desc" value="<?php echo $industry; ?>" type="date"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Address</p>
                        <input name="address" class="text-desc" value="<?php echo $address; ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Website</p>
                        <input name="website" class="text-desc" value="<?php echo $website; ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Description</p>
                        <input name="desc" class="text-desc" value="<?php echo $desc; ?>" type="text"></p>
                    </div>
                </div>
                <button id="save" name="submit-update-2" class="btn btn-success" type="submit">Save</button>
            </form>
 
        </div>
      </div>
      
      <div id="sec-2" class="sec-my-exp container-fluid">
        <div class="hero-text">My Experience</div>
        <div class="table-achievement">
          <p class="text-title">My Achievement</p>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Place</th>
                <th scope="col">Organizer</th>
                <th scope="col">File</th>
              </tr>
            </thead>
            <tbody>
            <?php $num = 1; ?>
        <?php if (!empty($data_achievement)): ?>
          <?php foreach ($data_achievement as $achievement): ?>
            <tr>
              <th scope="row"><?= $num ?></th>
              <td><?= $achievement["event_name"] ?></td>
              <td><?= $achievement["date"] ?></td>
              <td><?= $achievement["place"] ?></td>
              <td><?= $achievement["organizer"] ?></td>
              <td><?= $achievement["certificate"] ?></td>
              <td>
                <a class="edit-achievement btn btn-success">Ubah</a>
                <a class="del-achievement btn btn-danger" href="hapus_achevement.php?id_achievement=<?= $achievement[
                  "id_achievement"
                ] ?>">Hapus</a>
              </td>
              
              <?php $num++; ?>
            </tr>
            
          <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6">No achievements found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
          </table>
          <div class="btn">
            <button id="add-achievement"class="btn btn-success">Add</button>
          </div>
          <div class="table-achievement-edit">
            <form class="form" action="ubah_achevement.php" method="post">
                <p class="copy-1">My Achievement</p>
                <div class="info">
                  <input type="hidden" name="id_achievement" value="<?= $achievement[
                    "id_achievement"
                  ] ?>">
                    <div class="info-1">
                        <p class="title-2">Title</p>
                        <input name="event_name" class="text-desc" value="<?= $achievement[
                          "event_name"
                        ] ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Date</p>
                        <input name="time"class="text-desc" value="<?= $achievement[
                          "date"
                        ] ?>" type="date"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Place</p>
                        <input name="place"class="text-desc" value="<?= $achievement[
                          "place"
                        ] ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Organizer</p>
                        <input name="organizer" class="text-desc" value="<?= $achievement[
                          "organizer"
                        ] ?>" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">File</p>
                        <input name="certificate" class="text-desc" value="<?= $achievement[
                          "certificate"
                        ] ?>" type="file"></p>
                    </div>
                </div>
                <button id="save-edit" name="submit"class="btn btn-success" type="submit" href="ubah_achevement.php?id_achievement=<?= $achievement[
                  "id_achievement"
                ] ?>">Save</button>
            </form>
        </div>
        </div>
        <div class="table-achievement-add">
            <form class="form" action="user_achevement.php" method="post">
                <p class="copy-1">My Achievement</p>
                <div class="info">
                    <div class="info-1">
                        <p class="title-2">Title</p>
                        <input name="event_name" class="text-desc" value="" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Date</p>
                        <input name="time"class="text-desc" value="" type="date"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Place</p>
                        <input name="place"class="text-desc" value="" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">Organizer</p>
                        <input name="organizer" class="text-desc" value="" type="text"></p>
                    </div>
                    <div class="info-1">
                        <p class="title-2">File</p>
                        <input name="certificate" class="text-desc" value="" type="file"></p>
                    </div>
                </div>
                <button id="save-2" name="submit"class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
      </div>
    </div>

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
        <a href=""><img src="Assets/img/Logo-outline.png" alt="" /></a>
        © 2023 Career Seeker, All Rights Reserved.
      </div>
    </footer>

    <script src="Assets/js/logic.js"></script>
    <script src="Assets/js/profile.js"></script>
    <script>  // Mendapatkan referensi elemen tombol dan section
        $(document).ready(function() {
            $(".personal-information-edit").hide();
            $(".table-achievement-add").hide();
            $(".table-achievement-edit").hide(250);
            $("#edit-information").click(function() {
                $(".personal-information-edit").show(250); // Menampilkan section dengan class "personal-information-edit"
            });
            $("#add-achievement").click(function() {
                $(".table-achievement-add").show(250); // Menampilkan section dengan class "personal-information-edit"
            });
            $(".edit-achievement").click(function() {
                $(".table-achievement-edit").show(250); // Menampilkan section dengan class "personal-information-edit"
            });
            $("#save").click(function() {
                $(".personal-information-edit").hide(250); // Menampilkan section dengan class "personal-information-edit"
            });
            $("#save-2").click(function() {
                $(".table-achievement-add").hide(250); // Menampilkan section dengan class "personal-information-edit"
            });
        });
</script>
  </body>
</html>
