$(document).ready(function () {
  $("#contact_submit").on("click", function (e) {
    e.preventDefault();
    $.post(
      "./contact.php",
      {
        contact: true,
        name: $("#name").val(),
        email: $("#email").val(),
        text: $("#text").val(),
      },
      function (data) {
        if (data == 1) {
          alert("Your message has been successfully send!");
          $("#name").val("");
          $("#email").val("");
          $("#text").val("");
        } else {
          alert("Your message hasn't been send, please try again!");
        }
      }
    );
  });
});

history.scrollRestoration = "manual";
