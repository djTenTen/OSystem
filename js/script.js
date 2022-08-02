/* globals Chart:false, feather:false */
function viewpassword() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}






$(document).ready(function () {
$('select').selectize({
  sortField: 'text'
});
});