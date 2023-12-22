$(document).ready(function () {
  $("#login-form").submit(function (e) {
    e.preventDefault(); // Mencegah submit form secara default

    // Mengambil data form
    var email = $("#email").val();
    var password = $("#password").val();

    // Mengirim data ke user_login.php menggunakan AJAX
    $.ajax({
      url: "user_login.php",
      method: "POST",
      data: {
        email: email,
        password: password,
      },
      success: function (response) {
        if (response === "success") {
          // Jika login berhasil, lakukan aksi yang diperlukan (misalnya, redirect ke halaman lain)
          window.location.href = "home.html";
        } else {
          // Jika login tidak berhasil, tampilkan peringatan
          $("#login-error").show();
        }
      },
      error: function () {
        // Menampilkan pesan kesalahan jika terjadi masalah saat melakukan permintaan AJAX
        console.log("AJAX request error.");
      },
    });
  });
});
