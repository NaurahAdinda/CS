$(document).ready(function () {
  $(".sec-my-exp").hide();
  $(".my-profile").click(function () {
    $(".sec-my-profile").show(250);
    $(".sec-my-exp").hide(0);
  });

  $(".my-experience").click(function () {
    $(".sec-my-profile").hide(0);
    $(".sec-my-exp").show(250);
  });

  $(".btn-sec").click(function () {
    // Menghapus class "active" dari button yang memiliki class "active"
    $(".btn-sec.active").removeClass("active");

    // Menambahkan class "active" ke button yang diklik
    $(this).addClass("active");
  });
});
