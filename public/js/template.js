var bool_olho = true;
function olho_senha() {
  if (bool_olho) {
    olho =
      '<i onclick="olho_senha()" id="olho_senha" class="fa-solid fa-eye"></i>';
    $("#senha_login").attr("type", "text");
  } else {
    olho =
      '<i onclick="olho_senha()" id="olho_senha" class="fa-solid fa-eye-slash"></i>';
    $("#senha_login").attr("type", "password");
  }
  bool_olho = !bool_olho;
  $("#olho_senha").remove();
  $("#li_senha").append(olho);
}

function login() {
  var email = $("#email_login").val();
  var senha = $("#senha_login").val();

  $.ajax({
    url: "login",
    dataType: "JSON",
    type: "POST",
    data: {
      email,
      senha,
    },
    success: function (data) {
      location.reload();
    },
    error: function (error) {},
  });
}

function logout() {
  $.ajax({
    url: "logout",
    dataType: "JSON",
    type: "POST",

    success: function (data) {
      location.reload();
    },
    error: function (error) {},
  });
}
