function ShowPassFunction() {
  var x = document.getElementById("hideShowPassword");
  const eye = document.querySelector("#togglePassword")
  if (x.type === "password") {
    x.type = "text";
    eye.className = "fa fa-eye";
  } else {
    x.type = "password";
    eye.className = "fa fa-eye-slash";
  }
}