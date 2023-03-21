(function ($) {
  "use strict";
  $(function () {
    // dataInit();
  });
}.apply(this, [jQuery]));

// TODO: este método funciona correctamente.

// function dataInit() {
//   $.getJSON("../home/getDataInitJson", function (response) {
//     $.post(
//       "../home/setValidateToken",
//       { data: response.data },
//       function (response) {
//         var data = jQuery.parseJSON(response);
//         let user = data.data;
//         const $dropdownMenuButton1 = $("#dropdownMenuButton1");
//         $dropdownMenuButton1.html(user.nombre);
//       }
//     ).fail(function (error) {
//       console.log(error);
//     });
//   }).fail(function (error) {
//     console.log(error);
//   });
// }
