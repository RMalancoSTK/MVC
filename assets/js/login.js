// Copyright &copy; <?= date('Y'); ?>, este es un proyecto de prueba para el Mentoreo de PHP
(function ($) {
  "use strict";
  $(function () {
    $("#mensajeBienvenida").html(`
        Copyright &copy; ${new Date().getFullYear()}, este es un proyecto de prueba para el mentoreo de PHP
      `);
  });
}.apply(this, [jQuery]));

function ingresar(event) {
  event.preventDefault();
  let data = {};
  data.url = "login";
  data.data = {
    email: $("#email").val(),
    password: $("#password").val(),
  };
  data.type = "POST";
  data.action = "ingresar";
  let result = data.data;
  if (result.email == "" || result.password == "") {
    $("#mensajeError").html(`
        <div class="alert alert-warning alert-dismissible d-flex align-items-center fade show">
          <strong class="mx-2">¡Atención!</strong> Todos los campos son obligatorios.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      `);
  } else {
    $.ajax({
      url: data.url,
      type: data.type,
      data: result,
      success: function (response) {
        let data = JSON.parse(response);
        if (data.status == "success") {
          window.location.href = "../home/dashboard";
        } else {
          $("#mensajeError").html(`
          <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
             <div>${data.message}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          `);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
  return false;
}
